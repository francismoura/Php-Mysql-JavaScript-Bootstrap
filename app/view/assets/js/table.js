(function () {

        const URL = `../config/fetch.php`;

        // $(document).ready(function(){
        //     $("#preview").attr("scrolling", "no");
        //
        //     // Fullscreen preview
        //     $("#myModal").on('shown.bs.modal', function(event){
        //         $(this)
        //             .find(".modal-body")
        //             .html('<iframe src="../../pages/crudIframe.php"  class="fullscreen"></iframe>');
        //     });
        // });


        //incializa a tabela de solicitações do dashboard
        loadTable()
            .then(table)
            .catch(error => {
                console.log('There has been a problem with your fetch operation: ' + error.message)
            });

        async function loadTable() {
            const response = await fetch(URL + `?controller=FormController&action=findAll`);
            const jsonData = await response.json();
            if (response.ok) {
                if (jsonData.length > 0) {
                    return jsonData;
                }
            } else {//ERRO 404, 500
                throw 'Network response was not ok or syntax errors';

            }
        }

        function table(data) {
            let output =
                `
                    <table id = "user_data" class= "table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th> Nome </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

            data.map(data => {
                output +=
                    `
                        <tr>
                            <td> ` + data.id + ` </td>
                            <td> ` + data.nome + ` </td>
                            <td>
                                <a href="#editModal" class="edit" data-toggle="modal">
                                     <i class="material-icons" data-toggle="tooltip" data-original-title="Edit">edit</i>
                                </a>
                                <a href="#deleteModal" class="delete" data-toggle="modal">
                                    <i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete">delete</i>
                                </a>
                            </td>
                        </tr>
                    `;
            });

            output +=
                `
                    </tbody>
                </table>
                `;

            document.getElementById('div-table').innerHTML = output;

        }
    }
)
(document);