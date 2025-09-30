<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-4">Contact Us</h3>


                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>


                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($err); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>


                    <form method="POST" action="<?php echo e(route('contact.store')); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" maxlength="100" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="form-control" maxlength="150" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="6" class="form-control" maxlength="2000" required><?php echo e(old('message')); ?></textarea>
                        </div>


                        <button class="btn btn-primary" type="submit">Send Message</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH /var/www/html/contact-app/resources/views/contact.blade.php ENDPATH**/ ?>