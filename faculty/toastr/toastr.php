<?php if (isset($_SESSION['success'])): ?>
    <script>
        toastr.success('<?php echo $_SESSION['success']; ?>');
    </script>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Display error message -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; ?>
    </div>
    <script>
        toastr.error('<?php echo $_SESSION['error']; ?>');
    </script>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
