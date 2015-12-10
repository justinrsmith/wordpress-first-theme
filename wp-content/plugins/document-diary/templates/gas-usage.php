<?php
/**
 * Template Name: Gas Usage
 */
?>

<?php
    $pte = Page_Template_Plugin::get_instance();
    $locale = $pte->get_locale();
    get_header();
?>


<div class="row">
    <div class="col-sm-12">
        <?php
        // Start the loop
        while ( have_posts() ) : the_post();
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
               

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>
                
                <div class="entry-content">
                    <?php
                        $args = array(
                            'post-type' => 'post',
                            'post_status' => 'publish',
                            'post_per_page' => -1,
                            'category_name' => 'gas',
                            'order_by' => 'post_date',
                            'order' => 'DESC'
                        );

                        $gas_posts = new WP_Query( $args );
                        if( $gas_posts->have_posts() ) {
                            $total_q = 0;
                            $total_p = 0;
                            echo '<table class="table"></thead><tr>
                                  <th>Date</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  <th>Unit Price</th>
                                  </tr></thead><tbody>';
                            while( $gas_posts->have_posts() ) {
                                $gas_posts->the_post();
                                $purchased = get_field( 'fuel_purchased', $post->ID );
                                $price = get_field( 'price', $post->ID );

                                $total_q = $total_q + $purchased;
                                $total_p = $total_p + $price;

                                echo "<tr>
                                <td>" . date( "Y-m-d", strtotime( $post->post_date ) ) . "</td>
                                <td>" . $purchased . "</td>
                                <td>" . $price . "</td>
                                <td>" . round( $purchased/$price, 2 ) . " $/l</td>
                                </tr>";                         
                            }
                            echo "<tfoot>
                                  <th>Total</th>
                                  <th>" . $total_q . "</th>
                                  <th>" . $total_p . "</th>
                                  <th>" . round( $total_q/$total_p, 2 ) . " $/l</td>
                                  </tfoot>";

                                  echo "</tbody></table>";
                        }
                    ?>
                </div>

            </article>

        
        <?php
        // End loop
        endwhile; ?>
    </div><!-- /.blog-main -->
</div><!-- /.row -->
<?php get_footer(); ?>

    