<?php include "config/config.php"; ?>
<?php include "libraries/database.php"; ?>
<?php include "./helpers/format_helpers.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <a href="<?php echo get_bloginfo( 'wpurl' );?>"><!-- site title --></a>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/blog.css" rel="stylesheet">
    <link href="./css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <?php wp_head();?>
</head>

<body>

<header class="header">
    <div class="blog-masthead">
        div class="blog-masthead">
        <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="#">Home</a>
            <?php wp_list_pages( '&title_li=' ); ?>
        </nav>
    </div>
</div>
    </div>

    <div class="blog-header">
        <div class="container">
            <div class="blog-header">
                <h1 class="blog-title"><a href="<?php echo get_bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
                <p class="lead blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
            </div>
        </div>
    </div>
</header>

<main role="main" class="container">