<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-12 searchBarSet">
        <div class="form-group">
            <input type="text" class="from-control" name="serachQuery" id="serachQuery" placeholder="Search Books">
        </div>
        <ul id="searchResult"></ul>
        <div class="clear"></div>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($collection)): ?>
            <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(@$collections->id); ?></td>
                    <td>
                    <?php if($collections->image_link == "NA"): ?>
                    <a href="<?php echo e(@$collections->link); ?>" target="_blank"><img src="/storage/uploads/NA.png" height="100" width="100"></a>
                    <?php $imageLink = '/storage/uploads/NA.png'; 
                          $check = "NA";
                    ?>
                    <?php else: ?>
                        <a href="<?php echo e(@$collections->link); ?>" target="_blank"><img src="<?php echo e(@$collections->image_link); ?>" height="100" width="100"></a>
                    <?php $imageLink = $collections->image_link; 
                          $check = "Available";
                    ?>    
                    <?php endif; ?>
                    <?php if($collections->link == "NA"): ?>
                         <?php $baseLink = "NA"; ?>
                    <?php else: ?>
                         <?php $baseLink = $collections->link; ?>
                    <?php endif; ?>
                    <td><?php echo e(@$collections->title); ?></td>
                    <td><button type="button" class="addNewPost" data-title="<?php echo e(@$collections->title); ?>" data-image="<?php echo e(@$imageLink); ?>"
                    data-baseLink="<?php echo e(@$baseLink); ?>" data-author="<?php echo e(@$collections->author); ?>" data-price="<?php echo e(@$collections->price); ?>" data-check="<?php echo e($check); ?>">Add Post</button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php echo $__env->make('collection.post-get', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app-new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/BooksGram/resources/views/collection/index.blade.php ENDPATH**/ ?>