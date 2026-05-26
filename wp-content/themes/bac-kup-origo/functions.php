<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function (): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Keep imported HTML structure intact.
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
});

function bac_kup_backup_pages(): array
{
    return [
        'home' => [
            'url' => home_url('/'),
            'label' => 'Home',
            'slug' => 'home',
        ],
        'abonnementen' => [
            'url' => home_url('/abonnementen/'),
            'label' => 'Abonnementen',
            'slug' => 'abonnementen',
        ],
        'werkwijze' => [
            'url' => home_url('/werkwijze/'),
            'label' => 'Werkwijze',
            'slug' => 'werkwijze',
        ],
        'artsroute' => [
            'url' => home_url('/artsroute/'),
            'label' => 'Arts-route',
            'slug' => 'artsroute',
        ],
        'tarieven' => [
            'url' => home_url('/tarieven/'),
            'label' => 'Tarieven',
            'slug' => 'tarieven',
        ],
        'overons' => [
            'url' => home_url('/overons/'),
            'label' => 'Over ons',
            'slug' => 'overons',
        ],
        'faq' => [
            'url' => home_url('/faq/'),
            'label' => 'FAQ',
            'slug' => 'faq',
        ],
    ];
}

function bac_kup_is_current_slug(string $slug): bool
{
    if (is_front_page() && $slug === 'home') {
        return true;
    }

    if (!is_page()) {
        return false;
    }

    $post = get_queried_object();
    return $post instanceof WP_Post && $post->post_name === $slug;
}

function bac_kup_logo_url(): string
{
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $logo = wp_get_attachment_image_url($custom_logo_id, 'full');
        if ($logo) {
            return $logo;
        }
    }

    return home_url('/logo.png');
}

function bac_kup_global_part_option_key(string $part): string
{
    return $part === 'footer' ? 'bac_kup_global_footer_page_id' : 'bac_kup_global_header_page_id';
}

function bac_kup_el_id(): string
{
    return substr(md5(uniqid((string) wp_rand(), true)), 0, 8);
}

function bac_kup_widget(string $type, array $settings): array
{
    return [
        'id' => bac_kup_el_id(),
        'elType' => 'widget',
        'widgetType' => $type,
        'isInner' => false,
        'settings' => $settings,
        'elements' => [],
    ];
}

function bac_kup_container(array $elements, string $classes = '', array $extra_settings = []): array
{
    $settings = array_merge([
        'content_width' => 'full',
        '_css_classes' => $classes,
        'css_classes' => $classes,
    ], $extra_settings);

    return [
        'id' => bac_kup_el_id(),
        'elType' => 'container',
        'isInner' => false,
        'settings' => $settings,
        'elements' => $elements,
    ];
}

function bac_kup_section_from_elements(array $elements): array
{
    return [[
        'id' => bac_kup_el_id(),
        'elType' => 'section',
        'isInner' => false,
        'settings' => ['layout' => 'full_width', 'content_width' => 'full', 'gap' => 'no'],
        'elements' => [[
            'id' => bac_kup_el_id(),
            'elType' => 'column',
            'isInner' => false,
            'settings' => ['_column_size' => 100],
            'elements' => $elements,
        ]],
    ]];
}

function bac_kup_build_global_header_elementor_data(): array
{
    $logo = bac_kup_container([
        bac_kup_widget('image', [
            'image' => ['url' => esc_url(bac_kup_logo_url()), 'id' => 0],
            'image_size' => 'full',
            'link_to' => 'custom',
            'link' => ['url' => esc_url(home_url('/'))],
            '_css_classes' => 'nav-logo-img',
        ]),
    ], 'nav-logo');

    $nav_items = [];
    foreach (bac_kup_backup_pages() as $page) {
        $nav_items[] = bac_kup_widget('text-editor', [
            'editor' => '<a href="' . esc_url($page['url']) . '">' . esc_html($page['label']) . '</a>',
            '_css_classes' => 'bk-nav-item',
        ]);
    }
    $nav_items[] = bac_kup_widget('button', [
        'text' => 'Plan kennismaking',
        'link' => ['url' => esc_url(home_url('/contact/'))],
        '_css_classes' => 'nav-cta',
    ]);

    $ham = bac_kup_widget('html', [
        'html' => '<button class="nav-ham" id="navHam" aria-label="Menu openen" aria-expanded="false" aria-controls="mobMenu"><svg id="hamIcon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>',
    ]);

    $mob_links = '';
    foreach (bac_kup_backup_pages() as $page) {
        $mob_links .= '<li><a href="' . esc_url($page['url']) . '">' . esc_html($page['label']) . '<svg class="arr" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></li>';
    }

    $mob_menu = bac_kup_widget('html', [
        'html' => '<div class="mob-menu" id="mobMenu" role="dialog" aria-label="Navigatiemenu" aria-modal="true"><div class="mob-overlay" id="mobOverlay"></div><div class="mob-panel"><ul class="mob-links" role="list">' . $mob_links . '</ul><div class="mob-divider"></div><a href="' . esc_url(home_url('/contact/')) . '" class="mob-cta"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.42 2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 6 6l.92-.91a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>Plan kennismaking</a></div></div>',
    ]);

    $header = bac_kup_container([
        bac_kup_container([
            $logo,
            bac_kup_container($nav_items, 'nav-links'),
            $ham,
        ], 'nav-inner'),
        $mob_menu,
    ], 'bk-editable-header', [
        'html_tag' => 'nav',
        '_element_id' => 'mainNav',
    ]);

    return bac_kup_section_from_elements([$header]);
}

function bac_kup_footer_link_widgets(array $links): array
{
    $widgets = [];
    foreach ($links as $label => $url) {
        $widgets[] = bac_kup_widget('text-editor', [
            'editor' => '<a href="' . esc_url($url) . '">' . esc_html($label) . '</a>',
            '_css_classes' => 'ftr-link-item',
        ]);
    }
    return $widgets;
}

function bac_kup_build_global_footer_elementor_data(): array
{
    $year = esc_html(wp_date('Y'));

    $col1 = bac_kup_container([
        bac_kup_widget('image', [
            'image' => ['url' => esc_url(bac_kup_logo_url()), 'id' => 0],
            'image_size' => 'full',
            'link_to' => 'custom',
            'link' => ['url' => esc_url(home_url('/'))],
            '_css_classes' => 'footer-logo-link',
        ]),
        bac_kup_widget('text-editor', ['editor' => '<p class="ftr-tagline">Procesregie voor het MKB. Helder, schaalbaar en zonder onnodige lagen.</p>']),
        bac_kup_widget('text-editor', ['editor' => '<p class="ftr-disclaimer">Bac-kup levert procesondersteuning en verwerkt geen medische gegevens. Werkgever blijft verantwoordelijk voor regie en UWV-dossieropbouw.</p>']),
    ]);

    $col2 = bac_kup_container(array_merge([
        bac_kup_widget('text-editor', ['editor' => '<span class="ftr-col-title">Diensten</span>']),
    ], bac_kup_footer_link_widgets([
        'Abonnementen' => home_url('/abonnementen/'),
        'Werkwijze' => home_url('/werkwijze/'),
        'Basiscontract & arts-route' => home_url('/artsroute/'),
        'Tarieven (BAC)' => home_url('/tarieven/'),
    ])), 'ftr-col');

    $col3 = bac_kup_container(array_merge([
        bac_kup_widget('text-editor', ['editor' => '<span class="ftr-col-title">Bedrijf</span>']),
    ], bac_kup_footer_link_widgets([
        'Over ons' => home_url('/overons/'),
        'FAQ' => home_url('/faq/'),
        'Contact' => home_url('/contact/'),
    ])), 'ftr-col');

    $col4 = bac_kup_container(array_merge([
        bac_kup_widget('text-editor', ['editor' => '<span class="ftr-col-title">Legal</span>']),
    ], bac_kup_footer_link_widgets([
        'Privacyverklaring' => home_url('/privacyverklaring/'),
        'Cookieverklaring' => home_url('/cookieverklaring/'),
        'Disclaimer' => home_url('/disclaimer/'),
        'Klachtenregeling' => home_url('/klachtenregeling/'),
        'Algemene voorwaarden' => home_url('/algemene-voorwaarden/'),
        'Colofon' => home_url('/colofon/'),
    ])), 'ftr-col');

    $footer = bac_kup_container([
        bac_kup_container([$col1, $col2, $col3, $col4], 'footer-grid'),
        bac_kup_container([
            bac_kup_widget('text-editor', ['editor' => '<span class="ftr-copy">&copy; ' . $year . ' Bac-kup - Anne Frankstraat 35, 2548LA \'s-Gravenhage - KvK 99878232</span>']),
            bac_kup_widget('text-editor', ['editor' => '<span class="ftr-copy">Geen tracking - Geen advertenties</span>']),
        ], 'footer-bottom'),
    ], 'bk-editable-footer footer-wrap');

    return bac_kup_section_from_elements([$footer]);
}

function bac_kup_is_global_part_page(?int $id = null): bool
{
    $id = $id ?: get_queried_object_id();
    if (!$id) {
        return false;
    }
    $header_id = (int) get_option('bac_kup_global_header_page_id', 0);
    $footer_id = (int) get_option('bac_kup_global_footer_page_id', 0);
    return $id === $header_id || $id === $footer_id;
}

function bac_kup_ensure_global_parts(): void
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $parts = [
        'header' => ['title' => 'Global Header', 'slug' => 'global-header', 'builder' => 'bac_kup_build_global_header_elementor_data'],
        'footer' => ['title' => 'Global Footer', 'slug' => 'global-footer', 'builder' => 'bac_kup_build_global_footer_elementor_data'],
    ];
    $needs_widget_migration = get_option('bac_kup_global_parts_widgetized', '') !== '1';
    $needs_header_editor_upgrade = get_option('bac_kup_global_header_editable_v2', '') !== '1';

    foreach ($parts as $part => $cfg) {
        $opt = bac_kup_global_part_option_key($part);
        $id = (int) get_option($opt, 0);
        $exists = $id > 0 && get_post($id) instanceof WP_Post;

        if (!$exists) {
            $existing = get_page_by_path($cfg['slug'], OBJECT, 'page');
            if ($existing instanceof WP_Post) {
                $id = (int) $existing->ID;
            } else {
                $id = (int) wp_insert_post([
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'post_title' => $cfg['title'],
                    'post_name' => $cfg['slug'],
                    'post_content' => '',
                ], true);
            }
        }

        if ($id <= 0) {
            continue;
        }

        if (
            !$exists ||
            $needs_widget_migration ||
            ($part === 'header' && $needs_header_editor_upgrade)
        ) {
            $data = call_user_func($cfg['builder']);
            update_post_meta($id, '_elementor_data', wp_slash(wp_json_encode($data)));
            update_post_meta($id, '_elementor_edit_mode', 'builder');
            update_post_meta($id, '_elementor_template_type', 'wp-page');
            update_post_meta($id, '_elementor_version', defined('ELEMENTOR_VERSION') ? ELEMENTOR_VERSION : '');
        }
        update_option($opt, $id);
    }

    if ($needs_widget_migration) {
        update_option('bac_kup_global_parts_widgetized', '1');
    }
    if ($needs_header_editor_upgrade) {
        update_option('bac_kup_global_header_editable_v2', '1');
    }
}

function bac_kup_render_global_part(string $part): bool
{
    $id = (int) get_option(bac_kup_global_part_option_key($part), 0);
    if ($id <= 0 || !class_exists('\\Elementor\\Plugin')) {
        return false;
    }

    $content = \Elementor\Plugin::$instance->frontend->get_builder_content($id, true);
    if (!is_string($content) || trim($content) === '') {
        return false;
    }

    echo $content;
    return true;
}

add_action('admin_init', 'bac_kup_ensure_global_parts');

add_action('wp_enqueue_scripts', function (): void {
    $is_elementor_edit = false;
    if (class_exists('\\Elementor\\Plugin')) {
        $plugin = \Elementor\Plugin::$instance;
        if (isset($plugin->editor) && method_exists($plugin->editor, 'is_edit_mode') && $plugin->editor->is_edit_mode()) {
            $is_elementor_edit = true;
        }
        if (isset($plugin->preview) && method_exists($plugin->preview, 'is_preview_mode') && $plugin->preview->is_preview_mode()) {
            $is_elementor_edit = true;
        }
    }

    wp_enqueue_style(
        'bac-kup-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'bac-kup-backup-shared',
        get_template_directory_uri() . '/assets/css/backup-shared.css',
        ['bac-kup-fonts'],
        filemtime(get_template_directory() . '/assets/css/backup-shared.css')
    );

    wp_enqueue_style(
        'bac-kup-backup-legal',
        get_template_directory_uri() . '/assets/css/backup-legal.css',
        ['bac-kup-backup-shared'],
        filemtime(get_template_directory() . '/assets/css/backup-legal.css')
    );

    wp_enqueue_style(
        'bac-kup-brand-overrides',
        get_template_directory_uri() . '/assets/css/brand-overrides.css',
        ['bac-kup-backup-shared'],
        filemtime(get_template_directory() . '/assets/css/brand-overrides.css')
    );

    if (!$is_elementor_edit) {
        wp_enqueue_script(
            'bac-kup-theme',
            get_template_directory_uri() . '/assets/js/theme.js',
            [],
            filemtime(get_template_directory() . '/assets/js/theme.js'),
            true
        );

        wp_localize_script('bac-kup-theme', 'bacKupTheme', [
            'logoUrl' => bac_kup_logo_url(),
        ]);
    }
}, 99);

add_action('wp_head', function (): void {
    if (!is_page() && !is_front_page()) {
        return;
    }

    $post_id = get_queried_object_id();
    if (!$post_id) {
        return;
    }

    $custom_css = get_post_meta($post_id, '_bac_kup_page_css', true);
    if (!is_string($custom_css) || $custom_css === '') {
        return;
    }

    echo "\n<style id=\"bac-kup-page-css\">\n" . $custom_css . "\n</style>\n";
});

add_action('admin_notices', function (): void {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (get_option('bac_kup_backup_imported') !== '1') {
        echo '<div class="notice notice-warning"><p><strong>Bac-kup:</strong> de Bac-kup import is nog niet uitgevoerd. Ga naar een willekeurige admin pagina om de MU-plugin de import te laten doen.</p></div>';
    }

    $header_id = (int) get_option('bac_kup_global_header_page_id', 0);
    $footer_id = (int) get_option('bac_kup_global_footer_page_id', 0);
    if ($header_id > 0 || $footer_id > 0) {
        $items = [];
        if ($header_id > 0) {
            $items[] = '<a href="' . esc_url(admin_url('post.php?post=' . $header_id . '&action=elementor')) . '">Global Header bewerken</a>';
        }
        if ($footer_id > 0) {
            $items[] = '<a href="' . esc_url(admin_url('post.php?post=' . $footer_id . '&action=elementor')) . '">Global Footer bewerken</a>';
        }
        echo '<div class="notice notice-info"><p><strong>Bac-kup:</strong> ' . implode(' | ', $items) . '</p></div>';
    }
});

