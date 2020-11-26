<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <h2>Add New Post</h2>
                        </div>
                        <?php if(!empty($data)): ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="caption" class="col-md-4 col-form-label">Post Title</label>
                                    <input id="caption" type="text" class="form-control title <?php if ($errors->has('caption')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('caption'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="caption" value="<?php echo e($data['title']); ?>" autocomplete="caption" autofocus>
                                    <?php if ($errors->has('caption')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('caption'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="image" class="col-md-4 col-form-label">Post Image</label>
                                    <?php if(!empty($data['thumbnail']) && $data['thumbnail'] != "NA"): ?>
                                    <input type="hidden", class="form-control" id="googleGetImage" name="googleGetImage" value="<?php echo e($data['thumbnail']); ?>">
                                    <img src="<?php echo e($data['thumbnail']); ?>" width="50" height="50">
                                    <?php else: ?>
                                    <input type="hidden", class="form-control" id="googleGetImage" name="googleGetImage" value="/storage/uploads/NA.png">
                                    <img src="/storage/uploads/NA.png" width="50" height="50">
                                    <?php endif; ?>
                                    <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                                        <strong><?php echo e($message); ?></strong>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="caption" class="col-md-4 col-form-label">Author</label>
                                    <input id="author" type="text" class="form-control" name="author" value="<?php echo e($data['author']); ?>">
                                    <input id="buyLink" type="hidden" class="form-control" name="buyLink" value="<?php echo e($data['buyLink']); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="caption" class="col-md-4 col-form-label">Price</label>
                                    <input id="price" type="text" class="form-control" name="price" value="<?php echo e($data['price']); ?>">
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                                <input id="caption" type="text" class="form-control title <?php if ($errors->has('caption')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('caption'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="caption" value="<?php echo e(old('caption')); ?>" autocomplete="caption" autofocus>
                                <?php if ($errors->has('caption')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('caption'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div class="row">
                            <label for="image" class="col-md-4 col-form-label">Post Image</label>
                                <input type="file", class="form-control-file" id="image" name="image">
                                <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                                    <strong><?php echo e($message); ?></strong>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="row pt-4">
                            <button class="btn btn-primary">Add New Post</button>
                        </div>
                    </div>
                </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php echo $__env->make('posts.post-get', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/BooksGram/resources/views/posts/create.blade.php ENDPATH**/ ?>