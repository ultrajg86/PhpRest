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
        {% for list in lists %}
        <tr>
            <td class="text-center">{{ list.no }}</td>
            <td class="text-left">
                <a href="{{ base_url }}/notices/{{ list.no }}">{{ list.title }}</a>
            </td>
            <td class="text-center">{{ list.writer }}</td>
            <td class="text-center">{{ list.date }}</td>
            <td class="text-center">{{ list.count|number_format }}</td>
        </tr>
        {% endfor %}
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <div class="pagination">
                    <ul>
                        <li class="disabled"><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </td>
        </tr>
    </tfoot>
</table>
{% endblock %}