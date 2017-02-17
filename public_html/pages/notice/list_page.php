{% extends "layout.php" %}

{% block body %}

{{ name }}

<h1>Upload a file</h1>
<form method="POST" action="/upload" enctype="multipart/form-data">
    <label>Select file to upload:</label>
    <input type="file" name="newfile[]">
    <input type="file" name="newfile[]">
    <input type="file" name="newfile[]">
    <input type="file" name="newfile[]">
    <input type="file" name="newfile[]">
    <button type="submit">Upload</button>
</form>
{% endblock %}