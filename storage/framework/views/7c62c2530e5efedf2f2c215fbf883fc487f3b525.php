<?php if($paginator->hasPages()): ?>
    <nav>
        <ul class="pagination">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&lsaquo; <?php echo app('translator')->get('messages.previous'); ?></span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">&lsaquo; <?php echo app('translator')->get('messages.previous'); ?></a>
                </li>
            <?php endif; ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" ><?php echo app('translator')->get('messages.next'); ?> &rsaquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link"><?php echo app('translator')->get('messages.next'); ?> &rsaquo;</span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH /Users/giorgio/sviluppo/laravel/iFitness/resources/views/vendor/pagination/simple-bootstrap-4.blade.php ENDPATH**/ ?>