<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-12 searchBarSet">
        <div class="form-group">
            <input type="text" class="from-control" name="serachQuery" id="serachQuery" placeholder="Search Books">
        </div>
        <ul id="searchResult"></ul>
        <div class="clear"></div>
    </div>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post-content">
            <div class="row">
                <div class="col-12">
                    <header id="user-section">
                        <div class="user-profile-img">
                            <a href="/profile/<?php echo e($post->user->id); ?>">
                                <img src="/storage/<?php echo e($post->user->profile->image); ?>" class="w-100 post-img-user">
                            </a>
                        </div>
                        <div class="user-profile-name">
                            <h2>
                                <a href="/profile/<?php echo e($post->user->id); ?>"><?php echo e($post->caption); ?></a>
                            </h2>
                        </div>
                    </header>
                </div>
                <div class="col-12">
                    <a href="/profile/<?php echo e($post->user->id); ?>">
                    <?php if($post->googleImg == 1): ?>
                        <img src="<?php echo e($post->image); ?>" class="w-75 post-img">
                    <?php elseif($post->image == "NA"): ?>
                        <img src="/storage/uploads/NA.png" class="w-75 post-img">
                    <?php else: ?>
                        <img src="<?php echo e($post->image); ?>" class="w-75 post-img">
                    <?php endif; ?>
                    </a>
                </div>
            </div>
            <div class="row pt-2 pb-4"></div>
            <div class="post-like">
                <button class="btn btn-secondary ml-4" data-like="<?php echo e($post->id); ?>">Like<span class="post-like-count">1</span></button>
                <p class="personLike"><img src="/storage/<?php echo e($post->user->profile->image); ?>" class="post-img-user-like">Liked By <?php echo e($post->user->username); ?> </p>
            </div>
            <!-- <div class="col-6 offset-3">
                <div>    
                    <p>
                        <span class = "font-weight-bold">
                            <a href="/profile/<?php echo e($post->user->id); ?>">
                                <span class = "text-dark"><?php echo e($post->user->username); ?></span>
                            </a>
                        </span><?php echo e($post->caption); ?>

                    </p>
                </div>    
            </div> -->
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php echo $__env->make('posts.post-get', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app-new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/BooksGram/resources/views/posts/index.blade.php ENDPATH**/ ?>