import $ from 'jquery';
import 'datatables.net';

export default function reports() {

    console.log("aaa")

    $('#tables').DataTable();


        $('.toggleReportsCheckbox').change(function () {
            var checkbox = $(this);
            var reportId = checkbox.data('report-id');
            var marked = checkbox.prop('checked');

            console.log('Report ID:', reportId, 'Marked:', marked);

            $.ajax({
                type: 'POST',
                url: '/reports/toggleReports',
                data: { reportId: reportId, marked: marked },
                success: function (response) {
                    console.log(response);
                },
                error: function (error) {
                    console.error(error);
                    checkbox.prop('checked', !marked);
                }
            });
        });


}
