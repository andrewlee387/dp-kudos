<?php
/**
 * DP Kudos
 *
 * @package     DP Kudos
 * @author      Andrew Lee
 * @copyright   2020 Andrew Lee
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: DP Kudos
 * Description: This plugin prints "DP Kudos" inside an admin page.
 * Version:     1.0.0
 * Author:      Andrew Lee
 * Text Domain: hello-world
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class DPKudos {
    public function __construct() {
        register_deactivation_hook( __FILE__, array( $this, 'deactivate_kudos' ) );
        add_action( 'init', array($this, 'init_kudos_cpt_and_page') );
        add_shortcode('link_to_kudos', array($this, 'link_to_kudos_shortcode'));
        add_filter( 'wp_footer', array($this, 'kudos_form' ));
        add_filter('archive_template', array($this, 'kudos_archive_template' ));
    }

    public function deactivate_kudos() {
        unregister_post_type( 'kudos-cpt' );
        $to_delete = get_page_by_title('Kudos Board Page')->ID;
        wp_delete_post($to_delete, true);
    }

    public function init_kudos_cpt_and_page() {
        register_post_type( 'kudos-cpt',
            // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Kudos' ),
                    'singular_name' => __( 'Kudo' )
                ),
                'public' => true,
                'has_archive' => 'kudos',
                'rewrite' => array('slug' => 'kudos'),
                'show_in_rest' => true,
            )
        );
        if( get_page_by_title('Kudos Board Page') == NULL ) {

            $kudos_page = array(
                'post_title' => 'Kudos Board Page',
                'post_content' => 'Update this string',
                'post_status' => 'publish',
                'post_type' => 'page'
            );
            wp_insert_post($kudos_page);
        }
    }

    public function kudos_archive_template($template) {
        if (is_post_type_archive('kudos-cpt')) {
            $template = dirname(__FILE__) . '/archive-kudos-cpt.php';
            $template = locate_template($file_name);
            if (empty($template)) {
                // Template not found in theme's folder, use plugin's template as a fallback
                $template = dirname(__FILE__) . '/archive-kudos-cpt.php';
            }
        }
        return $template;
    }


    public function create_new_kudos_post($comment, $recipient) {
        $name = get_user_meta( $recipient, 'first_name', true );
    
        $postId = wp_insert_post(
            array(
                'post_type' => 'kudos-cpt',
                'post_title' => 'Kudos! to ' . $name,
                'post_content' =>  $comment,
                'post_status' => 'publish',
                'meta_input' => array("recipient" => $recipient),
                'has_archive' => true
            )
        );
    }

    public function kudos_form($args = []) {
        ?>
            <style>
                /* @keyframes bounce { 
                    0%, 20%, 50%, 80%, 100% {transform: translateY(0);} 
                    40% {transform: translateY(-20px);} 
                    60% {transform: translateY(-10px);} 
                } */

                @keyframes bounce { 
                    0%, 13%, 51% {transform: translateY(0);} 
                    26% {transform: translateY(-16px);} 
                    33% {transform: translateY(6px);}
                    38% {transform: translateY(-8px);} 
                    43% {transform: translateY(2px);}
                    47% {transform: translateY(-2px);}
                }

                @keyframes pulse {
                    0% {
                        /* transform: scale(0.95); */
                        box-shadow: 0 0 0 0 #00297370;
                    }
                    
                    30% {
                        /* transform: scale(1); */
                        box-shadow: 0 0 0 10px #00297300;
                    }
                    
                    100% {
                        /* transform: scale(0.95); */
                        box-shadow: 0 0 0 0 #00297300;
                    }
                }
                .kudos-cta:hover {
                    animation: none;
                    cursor: pointer;
                }
                .kudos-cta:hover .kudos-form {
                    visibility: visible;
                }
                .kudos-form {
                    visibility: hidden;
                }

                .kudos-cta {
                    display: flex;
                    flex-direction: reverse-column;
                    align-items: center;
                    background: #002973;
                    box-shadow: 0 0 0 0 #002973;
                    color: white;
                    text-transform: uppercase;
                    font-size: 10px;
                    animation: pulse 3s infinite, bounce 3s infinite 1s;
                    position: fixed;
                    height: 40px;
                    width: 40px;
                    bottom: 30px;
                    right: 30px;
                    padding: 10px;
                    border-radius: 50%;
                    border: 1px solid black;
                }
                .kudos-cta .text {
                    cursor: pointer;
                }
                .kudos-form {
                    position: absolute;
                    bottom: 20px;
                    right: -30px;
                    display: flex;
                    flex-direction: column;
                    max-width: 190px;
                    gap: 4px;
                    border: 30px solid transparent;
                    /* border-right: 30px solid transparent; */

                }
                .flex {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
                .kudos-form select {
                    height: 24px;
                }
                .kudos-form button {
                    background-color: white;
                    border: 1px solid #FF7E00;
                    border-radius: 4px;
                    padding: 4px;
                    outline: none;
                    color: #FF7E00;
                    cursor: pointer;
                    margin-left: 4px;
                }
                .kudos-form textarea {
                    padding: 5px;
                    height: 40px;
                }
                .kudos-form button:hover {
                    background-color: #ffe5cc;
                }
            </style>
            <script src="https://unpkg.com/canvas-confetti@1.5.1/dist/confetti.browser.js"></script>

            <script>
                window.addEventListener('load', function () {
                    const kudosCta = document.querySelector(".kudos-cta");
                    const commentInput = document.querySelector("#comment");
                    const recipientDropdown = document.querySelector("#recipient");
                    const sendButton = document.querySelector("#send");
                    kudosCta.addEventListener('mouseover', () => {
                        commentInput.focus();
                    })
                    sendButton.addEventListener('click', (event) => {
                        if (commentInput.value && recipientDropdown.value > -1) {
                            confetti();
                        } else {
                            event.preventDefault();
                        }
                    })

                })

            </script>
            <div class="kudos-cta">
                <div class="text">Kudos!</div>
                <form action="" method="POST">
                    <div class="kudos-form">
                        <textarea id="comment" name="comment"></textarea>
                        <div class="flex">
                            <?php 
                            wp_dropdown_users(array(
                                'show_option_none' => 'Select',
                                'name' => 'recipient',
                                'id' => 'recipient',
                                'selected' => null
                            ));
                            ?>
                        
                            <button id="send" type="submit">Send!</button>
                        </div>
                        <a href="/?post_type=kudos-cpt">View Kudos</a>
                    </div>
                </form>
            </div>


        <?php
        if(isset($_POST['comment']) && isset($_POST['recipient'])) {
            $comment = $_POST['comment'];
            $recipient = $_POST['recipient'];
            if ($comment != null && $recipient != -1) {
                $this->create_new_kudos_post($comment, $recipient); 
            }
        }
    }

}
new DPKudos();