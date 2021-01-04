

<table class="blueTable">
    <thead>
    <tr>
        <th>head1</th>
        <th>head2</th>
        <th>head3</th>
    </tr>(-
    )    </thead>
    <tfoot>
    <tr>
        <td colspan="3">
            <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
        </td>
    </tr>
    </tfoot>
    <tbody>
    <tr>
        @foreach ($data as $Incomes)
            {{$Incomes -> id}}
            {{$Incomes -> amount}}
            {{$Incomes -> created_at}}
            {{$Incomes -> sponsor_name_English}}
            {{$Incomes -> name_English}}
            {{$Incomes -> service_name_English}}
        @endforeach
        <td>cell1_1</td>
        <td>cell2_1</td>
        <td>cell3_1</td>
    </tr>
    </tbody>
</table>
