<?php
/**
 * Custom Theme Updater for Star Themes
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class StarThemeUpdater {
    
    private $github_token = 'ghp_[REDACTED]';
    private $themes = [
        'star-master' => 'NinjaPhilip/star-master',
        'star-child' => 'NinjaPhilip/star-child'
    ];
    
    public function __construct() {
        add_filter('pre_set_site_transient_update_themes', [$this, 'check_for_updates']);
        add_filter('themes_api', [$this, 'theme_api_call'], 10, 3);
        add_action('upgrader_process_complete', [$this, 'purge_cache'], 10, 2);
    }
    
    public function check_for_updates($transient) {
        if (empty($transient->checked)) {
            return $transient;
        }
        
        foreach ($this->themes as $theme_slug => $repo) {
            $theme_data = wp_get_theme($theme_slug);
            if (!$theme_data->exists()) {
                continue;
            }
            
            $current_version = $theme_data->get('Version');
            $remote_version = $this->get_remote_version($repo);
            
            if (version_compare($current_version, $remote_version, '<')) {
                $transient->response[$theme_slug] = [
                    'theme' => $theme_slug,
                    'new_version' => $remote_version,
                    'url' => "https://github.com/{$repo}",
                    'package' => "https://github.com/{$repo}/archive/refs/heads/main.zip"
                ];
            }
        }
        
        return $transient;
    }
    
    private function get_remote_version($repo) {
        // First try to get the latest release
        $api_url = "https://api.github.com/repos/{$repo}/releases/latest";
        
        $response = wp_remote_get($api_url, [
            'headers' => [
                'Authorization' => 'token ' . $this->github_token,
                'User-Agent' => 'WordPress-Theme-Updater'
            ]
        ]);
        
        if (!is_wp_error($response)) {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);
            
            if (isset($data['tag_name'])) {
                return ltrim($data['tag_name'], 'v');
            }
        }
        
        // Fallback to commit hash if no releases
        $api_url = "https://api.github.com/repos/{$repo}/commits/main";
        
        $response = wp_remote_get($api_url, [
            'headers' => [
                'Authorization' => 'token ' . $this->github_token,
                'User-Agent' => 'WordPress-Theme-Updater'
            ]
        ]);
        
        if (is_wp_error($response)) {
            return false;
        }
        
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        
        if (isset($data['sha'])) {
            // Use commit date as version for comparison
            $commit_date = strtotime($data['commit']['committer']['date']);
            return date('Y.m.d.Hi', $commit_date);
        }
        
        return false;
    }
    
    public function theme_api_call($result, $action, $args) {
        if ($action !== 'theme_information') {
            return $result;
        }
        
        if (!isset($args->slug) || !array_key_exists($args->slug, $this->themes)) {
            return $result;
        }
        
        $repo = $this->themes[$args->slug];
        $theme_data = wp_get_theme($args->slug);
        
        return (object) [
            'name' => $theme_data->get('Name'),
            'slug' => $args->slug,
            'version' => $this->get_remote_version($repo),
            'author' => $theme_data->get('Author'),
            'homepage' => "https://github.com/{$repo}",
            'description' => $theme_data->get('Description'),
            'download_link' => "https://github.com/{$repo}/archive/refs/heads/main.zip"
        ];
    }
    
    public function purge_cache($upgrader, $hook_extra) {
        if (isset($hook_extra['type']) && $hook_extra['type'] === 'theme') {
            delete_site_transient('update_themes');
        }
    }
}

// Initialize the updater
new StarThemeUpdater();