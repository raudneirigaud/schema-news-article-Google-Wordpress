<?php
        $description =  get_the_excerpt();
        $headline = get_the_title($post->ID);
        $permalink = get_permalink();
        $author = get_the_author_meta('display_name', $author_id);
        $imgurl = get_the_post_thumbnail_url(); 
        $datepublished = get_the_date('c'); 
        $datemodified = get_the_modified_time('c'); 
        $schema_blogposting = array(
            '@context'  => "http://schema.org",
            '@type'     => "NewsArticle",
            'mainEntityOfPage' => array(
                '@type' => "WebPage",
                '@id'   => $permalink
            ),
            'headline' => $headline,
            'description' => $description,
            'image'     => array(
                '@type'     => "ImageObject",
                'url'       => $imgurl,
                'height'    => "1024",
                'width'     => "769"
            ),
            'datePublished' => $datepublished,
            'dateModified' => $datemodified,
            'author'    => array(
                '@type'     => "Person",
                'name'      => $author
            ),
            'publisher' => array(
                '@type' => "Organization",
                'name'  => "Nome da Empresa",
                'logo'  => array(
                    '@type'  => "ImageObject",
                    'url'    => 'https://www.yourweb.com/yourlogo.png',
                    'width'  => "250",
                    'height' => "66"
                )
            ),
        );

 echo '<script type="application/ld+json">' . json_encode($schema_blogposting) . '</script>'
?>