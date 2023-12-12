<?php
/**
* Footer template.
*
* @package Alexastudiocreation
*/
?>

<footer>footer</footer>
</div>
</div>

<?php wp_footer(); ?>

<script>
  jQuery(document).ready(function($) {
    var $grid = $('.front-page-content .grid').isotope({
        itemSelector: '.col-lg-4',
        layoutMode: 'fitRows'
    });

    $grid.imagesLoaded().progress(function() {
        $grid.isotope('layout');
    });
});

</script>
</div>
</body>
</html>
</body>
</html>
