На сайте появилась новая заявка

<table>
    <tr>
        <td class="table_header">Название организации</td>
        <td class="table_header">Город</td>
        <td class="table_header">Тип объекта</td>
        <td class="table_header">ФИО</td>
        <td class="table_header">Номер телефона</td>
        <td class="table_header">Электронная почта</td>
        <td class="table_header">Техническое задание</td>
    </tr>
    <tr>
        <td>{{ $formData['orgname'] }}</td>
        <td>{{ $formData['town'] }}</td>
        <td>{{ $formData['objecttype'] }}</td>
        <td>{{ $formData['fio'] }}</td>
        <td>{{ $formData['phonenumber'] }}</td>
        <td>{{ $formData['email'] }}</td>
        <td>Файл прикреплен</td>
    </tr>
</table>

<style>
    td {
        text-align: center;
        border: 1px solid black;
        padding: 10px;
    }

    .table_header {
        font-weight: bold;
    }

    table {
        border: solid black 1px;
    }
</style>
