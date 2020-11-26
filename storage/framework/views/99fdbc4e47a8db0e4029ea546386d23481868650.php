<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="<?php echo e($user->profile->profileImage()); ?>" style = "height:150px" class = "rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class = "d-flex align-items-center pb-3">
                    <div class = "h4"><?php echo e($user -> username); ?></div>

                <follow-button user-id = "<?php echo e($user->id); ?>" follows = "<?php echo e($follows); ?>"></follow-button> <!--component; no refresh required-->
                </div>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?> <!--true or false for authorize that link. /profile/1 for hide "add new post" to unlogged users, and other users-->
                   <!--  <a href="/p/create">Add New Post</a> -->
                <?php endif; ?>
                
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?> <!--true or false for authorize that link. /profile/1 for hide "edit profile" to the unlogged users, and other users -->
                <a href="/profile/<?php echo e($user->id); ?>/edit">Edit Profile</a> 
            <?php endif; ?>
            <div class = "d-flex">
            <div class = "pr-5"><strong><?php echo e($postCount); ?></strong> posts</div>
            <div class = "pr-5"><strong><?php echo e($followersCount); ?></strong> followers</div>
            <div class = "pr-5"><strong><?php echo e($followingCount); ?></strong> following</div>
            </div>  
        <div class = "pt-4 font-weight-bold"><?php echo e($user->profile->title); ?></div> 
        <div><?php echo e($user->profile->description); ?></div> 
        <div><a href="#"><?php echo e($user->profile->url); ?></a></div>
        </div>
    </div>
    <div class="row pt-5">
        <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4 pb-4">
            <a href="<?php echo e($post->post_link); ?>">
            <?php if($post->googleImg == 1): ?>
                <img src="<?php echo e($post->image); ?>" class = "w-100">
            <?php else: ?>
                 <img src="<?php echo e(asset('storage/uploads/'.$post->image)); ?>" class = "w-100">
            <?php endif; ?>
            </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/BooksGram/resources/views/profiles/index.blade.php ENDPATH**/ ?>