{% extends "layout.php" %}

{% block body %}

<table class="table">
    <colgroup>
        <col style="width:10%;"/>
        <col style="width:60%;"/>
        <col style="width:10%;"/>
        <col style="width:10%;"/>
        <col style="width:10%;"/>
    </colgroup>
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Title</th>
            <th class="text-center">Writer</th>
            <th class="text-center">Date</th>
            <th class="text-center">Count</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">4</td>
            <td class="text-left">
                <a href="{{ base_url }}/notices/1">부산 여행~</a>
            </td>
            <td class="text-center">2</td>
            <td class="text-center">{{ '2017-01-26' }}</td>
            <td class="text-center">{{ 10000|number_format }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">

            </td>
        </tr>
    </tfoot>
</table>
<!--
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
-->
{% endblock %}