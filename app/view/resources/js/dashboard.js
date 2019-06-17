(function () {

        const URL = `../config/fetch.php`;

        document.getElementById('logout').addEventListener('click', function () {
            event.preventDefault();
            window.location = "home";
        });

        //incializa a tabela de solicitações do admin
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
                throw 'Network response was not ok or syntax error';

            }
        }

        function table(data) {
            let output =
                `
                    <table id = "user_data" class= "table responsive-table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th> id </th>
                                <th> Nome </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

            let cont = 0;
            data.map(
                data => {
                    output +=
                        `
                            <tr class="position-relative">
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox${cont++}" name="options[]" value="1">
                                         <label for="checkbox${cont++}"></label>
                                    </span>
                                </td>
                                <td> 
                                    <a class="icone" href="#">
                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        <u>` + data.id + `</u>
                                    </a>                                    
                                </td>
                                <td> ` + data.nome + ` </td>
                                <td>
                                    <a href="#editModal" class="edit" data-toggle="modal">
                                         <i class="material-icons" data-toggle="tooltip" title="" 
                                         data-original-title="Edit">edit</i>
                                    </a>
                                    <a href="#deleteModal" class="delete" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="" 
                                        data-original-title="Delete">delete</i>
                                    </a>
                                </td>
                            </tr>
                        `;
                }
            );

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