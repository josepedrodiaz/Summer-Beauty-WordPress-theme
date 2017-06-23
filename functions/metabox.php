<?php 

/*
author: ANDRÉ VALLE - Web Developer Full Stack
agency: http://b4w.com.br

description document: META BOXS

*/



/*    ----------------- META BOX'S ------------------ /

// --- campo de texto

        array( 
        'label' => 'Nome do Cliente',  
        'desc'  => '',  
        'id'    => $prefix.'name',  
        'type'  => 'text', 
        ),

// --- campo de mensagem

        array(  
        'label'=> 'Textarea',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'textarea',  
        'type'  => 'textarea'  
        ),

// --- checkbox  

        array(  
        'label'=> 'Checkbox Input',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'checkbox',  
        'type'  => 'checkbox'  
        ),

// --- Selectbox  

        array(  
        'label'=> 'Select Box',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'select',  
        'type'  => 'select',  
        'options' => array (  
        'one' => array (  
        'label' => 'Option One',  
        'value' => 'one'  
        ),  
        'two' => array (  
        'label' => 'Option Two',  
        'value' => 'two'  
        ),  
        'three' => array (  
        'label' => 'Option Three',  
        'value' => 'three'  
        )  
        )  
        ),

// --- radio group

        array(  
        'label' => 'Radio Group',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'radio',  
        'type'  => 'radio',  
        'options' => array (  
        'one' => array (  
        'label' => 'Option One',  
        'value' => 'one'  
        ),  
        'two' => array (  
        'label' => 'Option Two',  
        'value' => 'two'  
        ),  
        'three' => array (  
        'label' => 'Option Three',  
        'value' => 'three'  
        )  
        )  
        ),  

// --- checkbox group

        array(  
        'label' => 'Checkbox Group',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'checkbox_group',  
        'type'  => 'checkbox_group',  
        'options' => array (  
        'one' => array (  
        'label' => 'Option One',  
        'value' => 'one'  
        ),  
        'two' => array (  
        'label' => 'Option Two',  
        'value' => 'two'  
        ),  
        'three' => array (  
        'label' => 'Option Three',  
        'value' => 'three'  
        )  
        )  
        ),  

// --- category

        array(  
        'label' => 'Category',  
        'id'    => 'category',  
        'type'  => 'tax_select'  
        ),  

// --- List posts

        array(  
        'label' => 'Post List',  
        'desc' => 'A description for the field.',  
        'id'    =>  $prefix.'post_id',  
        'type' => 'post_list',  
        'post_type' => array('post','page')  
        ),  

// --- Data

        array(  
        'label' => 'Date',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'date',  
        'type'  => 'date'  
        ), 

// --- image

        array(  
        'name'  => 'Image',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'image',  
        'type'  => 'image'  
        ),

// --- duplicar

        array(  
        'label' => 'Repeatable',  
        'desc'  => 'A description for the field.',  
        'id'    => $prefix.'repeatable',  
        'type'  => 'repeatable'  
        )          


$prefix = 'dbt_';

$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Custom meta box',
    'page'  => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Text box',
            'desc' => 'Enter something here',
            'id' => $prefix . 'text',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Textarea',
            'desc' => 'Enter big text here',
            'id' => $prefix . 'textarea',
            'type' => 'textarea',
            'std' => 'Default value 2'
        ),
        array(
            'name' => 'Select box',
            'id' => $prefix . 'select',
            'type' => 'select',
            'options' => array('Option 1', 'Option 2', 'Option 3')
        ),
        array(
            'name' => 'Radio',
            'id' => $prefix . 'radio',
            'type' => 'radio',
            'options' => array(
                array('name' => 'Name 1', 'value' => 'Value 1'),
                array('name' => 'Name 2', 'value' => 'Value 2')
            )
        ),
        array(
            'name' => 'Checkbox',
            'id' => $prefix . 'checkbox',
            'type' => 'checkbox'
        )
    )
);

add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
    global $meta_box;

    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);

    if ($template_file == 'page-hotel.php') {
        add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
    }
}

// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;
    
    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    
    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
             // text  
            case 'text':  
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
                    <br /><span class="description">'.$field['desc'].'</span>';  
            break;

            // textarea  
            case 'textarea':  
                echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
                    <br /><span class="description">'.$field['desc'].'</span>';  
            break;  

            // checkbox  
            case 'checkbox':  
                echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/> 
                    <label for="'.$field['id'].'">'.$field['desc'].'</label>';  
            break;  

            // select  
            case 'select':  
                echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';  
                foreach ($field['options'] as $option) {  
                    echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
                }  
                echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
            break; 

            // radio  
            case 'radio':  
                foreach ( $field['options'] as $option ) {  
                    echo '<input type="radio" name="'.$field['id'].'" id="'.$option['value'].'" value="'.$option['value'].'" ',$meta == $option['value'] ? ' checked="checked"' : '',' /> 
                            <label for="'.$option['value'].'">'.$option['label'].'</label><br />';  
                }  
            break;
            // checkbox_group  
            case 'checkbox_group':  
                foreach ($field['options'] as $option) {  
                    echo '<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />  
                            <label for="'.$option['value'].'">'.$option['label'].'</label><br />';  
                }  
                echo '<span class="description">'.$field['desc'].'</span>';  
            break;
            // tax_select  categoria
            case 'tax_select':  
                echo '<select name="'.$field['id'].'" id="'.$field['id'].'"> 
                        <option value="">Selecione</option>'; // Select One  
                $terms = get_terms($field['id'], 'get=all');  
                $selected = wp_get_object_terms($post->ID, $field['id']);  
                foreach ($terms as $term) {  
                    if (!empty($selected) && !strcmp($term->slug, $selected[0]->slug))   
                        echo '<option value="'.$term->slug.'" selected="selected">'.$term->name.'</option>';   
                    else  
                        echo '<option value="'.$term->slug.'">'.$term->name.'</option>';   
                }  
                $taxonomy = get_taxonomy($field['id']);  
                echo '</select><br /><span class="description"><a href="'.get_bloginfo('home').'/wp-admin/edit-tags.php?taxonomy='.$field['id'].'">Manage '.$taxonomy->label.'</a></span>';  
            break;
            // post_list  
            case 'post_list':  
            $items = get_posts( array (  
                'post_type' => $field['post_type'],  
                'posts_per_page' => -1  
            ));  
                echo '<select name="'.$field['id'].'" id="'.$field['id'].'"> 
                        <option value="">Select One</option>'; // Select One  
                    foreach($items as $item) {  
                        echo '<option value="'.$item->ID.'"',$meta == $item->ID ? ' selected="selected"' : '','>'.$item->post_type.': '.$item->post_title.'</option>';  
                    } // end foreach  
                echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
            break; 
            // date
            case 'date':
                echo '<input type="text" class="datepicker" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30"/>
                        <br /><span class="description">'.$field['desc'].'</span>';
            break;
            // image  
            case 'image':  
                $image = get_template_directory_uri().'/images/image.png';    
                echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';  
                if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium'); $image = $image[0]; }                 
                echo    '<input name="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$meta.'" /> 
                            <img src="'.$image.'" class="custom_preview_image" alt="" /><br /> 
                                <input class="custom_upload_image_button button" type="button" value="Choose Image" /> 
                                <small> <a href="#" class="custom_clear_image_button">Remove Image</a></small> 
                                <br clear="all" /><span class="description">'.$field['desc'].'';  
            break;
            // repeatable  
            case 'repeatable':  
                echo '<a class="repeatable-add button">+</a> 
                        <ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';  
                $i = 0;  
                if ($meta) {  
                    foreach($meta as $row) {  
                        echo '<li><span class="sort hndle">|||</span> 
                                    <input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="'.$row.'" size="30" /> 
                                    <a class="repeatable-remove button" >-</a></li>';  
                        $i++;  
                    }  
                } else {  
                    echo '<li><span class="sort hndle">|||</span> 
                                <input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="" size="30" /> 
                                <a class="repeatable-remove button">-</a></li>';  
                }  
                echo '</ul> 
                    <span class="description">'.$field['desc'].'</span>';  
            break; 
        }
        echo    '<td>',
            '</tr>';
    }
    
    echo '</table>';
}

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
    global $meta_box;
    
    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    
    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}

function remove_taxonomy_boxes() {  
    remove_meta_box( 'categorydiv', 'post', 'side');
}  
add_action( 'admin_menu' , 'remove_taxonomy_boxes' );  

?>

*/