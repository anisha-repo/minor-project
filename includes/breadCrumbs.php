<?php
function generateBreadcrumbs($links) {
    $output = '<ul class="breadcrumb">';
    $totalLinks = count($links);
    foreach ($links as $name => $url) {
        $output .= '<li class="breadcrumb-item"><a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($name) . '</a></li>';
        if (--$totalLinks > 0) {
            $output .= '<li class="separator">&gt;</li>'; // Add separator
        }
    }
    $output .= '</ul>';
    return $output;
}

// Example usage
$breadcrumbs = [
    'Home' => 'index.php',
    'Products' => 'products.php',
    'Details' => '' // Current page
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breadcrumbs Example</title>
    <link rel="stylesheet" href="styles/Breadcrumbs.css">
    
</head>
<body>

    <!-- Breadcrumbs in a separate div -->
    <div class="breadcrumb-container">
    <div class="container-fluid"><!--container start 1-->
              <div class="col-md-12"><!--col-md-12 start-->
                    <?php echo generateBreadcrumbs($breadcrumbs); ?>
              </div>  <!--col-md-12 end-->
            </div><!--container end 1-->
        
    </div>

   

</body>
</html>
