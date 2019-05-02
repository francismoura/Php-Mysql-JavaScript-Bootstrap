(function () {

        const URL = `../config/fetch.php`;
        const btnHome = document.getElementById('btnHome').addEventListener('click', redirectHome);

        //incializa a tabela de solicitações do dashboard
        loadTable()
            .then(table)
            .catch(error => {
                console.log('There has been a problem with your fetch operation: ' + error.message)
            });

        function redirectHome(event) {
            event.preventDefault();
            window.location = "home";
        }

        async function loadTable() {
            const response = await fetch(URL + `?controller=FormController&action=findAll`);
            const jsonData = await response.json();
            if (response.ok) {
                if (jsonData.length > 0) {
                    return jsonData;
                } else {//ERRO 404, 500
                    console.log('Network response was not ok or syntax error');
                }
            }
        }

        function table(data) {
            let output =
                `
                    <table id = "user_data" class= "table table-bordered table-striped">
                        <thead> 
                            <tr>
                                <th width="1%"> id </th>
                                <th width = "15%"> Nome </th>
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
                        </tr>
                `;
            });

            output +=
                `
                    </tbody>
                </table>
            `;

            $('#div-table').html(output);
        }
    }
)
(document);