<!DOCTYPE html>
<html>
<head>
    <title>CKEditor 5 Integration</title>
    <!-- Include CKEditor 5 from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</head>
<body>
<h1>CKEditor 5 Integration</h1>
<!-- Add a textarea for the editor -->
<form action="{{route('test.store')}}" method="POST">
    @csrf
    <textarea name="about"></textarea>
    <button type="submit">bas</button>
</form>
<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('textarea'))
        .then(editor => {
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error('Error during initialization of the editor', error);
        });
</script>
</body>
</html>
