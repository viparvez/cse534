<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(url('/')); ?>/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo e(url('/')); ?>/admin/css/simple-sidebar.css" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo e(url('/')); ?>/admin/resources/demos/style.css">

  <!-- <link rel="stylesheet" href="<?php echo e(url('/')); ?>/admin/css/bootstrap.min.css"/> -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/drag/css/tether.min.css"/>
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/drag/css/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/drag/css/form_builder.css"/>


</head>

<body>

  <div class="d-flex" id="wrapper">

  <?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <!-- Page Content -->
    <div id="page-content-wrapper">

      
      <?php echo $__env->make('layouts.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <?php echo $__env->yieldContent('content'); ?>
      
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
</body>

</html><?php /**PATH /Users/asadzaman/Desktop/cse534/admin/resources/views/layouts/app.blade.php ENDPATH**/ ?>