<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="news-page">
    <div class="container">
                <ol class="breadcrumb">
                  <li><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
                  <li><a href="<?php echo e(route('news')); ?>">Berita</a></li>
                  <li class="active"><?php echo e($news->tag->name); ?></li>
                </ol>
        <div class="news-bor">
            <div class="col-lg-8">
                <div class="news-post">
                    <h2 class="news-post-title"><?php echo e($news->title); ?></h2>
                    <p class="news-post-meta"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo e($news->date); ?> | <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Penulis <a href="#"><?php echo e($news->user->name); ?></a></p>
                    <img src="<?php echo e(Image::url(URL::to($path. '' .$news->image), 800,700,array('crop'))); ?>" alt="<?php echo e($news->title); ?>" class="img-thumbnail news-image">
                    <p><?php echo $news->content; ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <h3 class="heading-title">Berita Lainnya</h3>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>