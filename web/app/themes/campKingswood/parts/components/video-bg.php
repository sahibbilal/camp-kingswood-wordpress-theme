<?php
if (!empty($video_background)) :
    preg_match('/src="(.+?)"/', $video_background, $matches);
    $regex_pattern = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
    $video_src = $matches[1];
    $match;
    if (preg_match($regex_pattern, $video_src, $match)) : ?>
        <div class="video-bg video-bg--yt">
            <div class="playerYT" data-property="{videoURL:'<?php echo $video_background_url; ?>',containment:'self', autoPlay:true, mute:true,startAt:0,opacity:1,remember_last_time:false,showYTLogo:false,showControls:false,loop: true,stopMovieOnBlur:false }"></div>
        </div>
    <?php
    else :
        if (strpos($video_src, 'vimeo') !== false) {
            $params[] = array(
                'autoplay'  => 1,
                'muted'     => 1,
                'loop'      => 1,
                'controls'  => 0,
                'autopause' => 0,
            );
        }
        $new_src = add_query_arg($params, $video_src);
        $video_background = str_replace($video_src, $new_src, $video_background);
        $attributes = 'frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen';
        $video_background = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video_background);
    ?>
        <div class="video-bg">
            <?php echo $video_background; ?>
        </div>
<?php
    endif;
endif;
