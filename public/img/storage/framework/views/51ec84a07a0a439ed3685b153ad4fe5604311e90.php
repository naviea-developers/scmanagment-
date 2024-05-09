<!-- vendor css -->
<link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
<link href="../lib/select2/css/select2.min.css" rel="stylesheet">

<!-- Bracket CSS -->
<link rel="stylesheet" href="../css/bracket.css">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js"></script>
<style>
    body{
        color: #000 !important;
    }
    .br-mainpanel{
        padding: 30px;
    }
    .bodyTitle{
        width: 100%;
        font-size: 30px;
        color: #000 !important;
        margin-bottom: 20px
    }

    .card{
        padding: 20px;
        border-radius: 5px;
    }


    .col-1 ,.col-2 ,.col-3 ,.col-4 ,.col-5 ,.col-6 ,.col-7 ,.col-8 ,.col-9 ,.col-10 ,.col-11 ,.col-12 {
        float: left;
    }

    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: 3px;
        justify-content: flex-end;
    }

    .resize-none{
        resize: none;
    }

    .ck.ck-editor__editable_inline>:last-child {
        margin-bottom: var(--ck-spacing-large);
        height: 200px;
    }

.tags-input-wrapper {
    border: 1px solid #ced4da;
    padding: 7px;
    border-radius: 3px;
    overflow-x: scroll;
    display: flex;
}

.tags-input-wrapper input {
    border: none !important;
    outline: none !important;
}

.tags-input-wrapper .tag {
    background: #ebc5ff;
    margin: 2px;
    padding: 5px 10px;
    border-radius: 5px;
    position: relative;
}

.tags-input-wrapper .tag a {
    position: absolute;
    right: 2px;
    top: -4px;
    cursor: pointer;
}
</style>

<?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/inc/css.blade.php ENDPATH**/ ?>