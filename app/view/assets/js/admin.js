(function () {

        const URL = `../config/fetch.php`;

        document.getElementById("logout").addEventListener("click", function () {
            event.preventDefault();
            window.location = "home";
        });

        //incializa a tabela de solicitações do admin
        loadTable()
            .then(outputTable)
            .catch(error => {
                console.log("There has been a problem with your fetch operation: " + error.message)
            });

        async function loadTable() {
            const response = await fetch(URL + `?controller=AdminController&action=getDataToTable`);
            const jsonData = await response.json();
            if (response.ok) {
                console.log('JSON', jsonData);
                if (Object.keys(jsonData).length > 0) {
                    return jsonData.sort(function compare(a, b) {
                        return a.dataSolicitacao < b.dataSolicitacao ? -1 : a.dataSolicitacao > b.dataSolicitacao ? 1 : 0;
                    });
                }
            } else {//ERRO 404, 500
                throw "Network response was not ok or syntax error";
            }
        }

        function outputTable(data) {
            console.log("dados", data);
            let output =
                `<table id = "user_data" class= "table responsive-table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Solicitação</th>
                            <th>Data</th>
                            <th>Actions</th>                          
                        </tr>
                    </thead>
                    <tbody>`;

            let cont = 0;
            data.map(
                data => {
                    const newData = new Date(data.dataSolicitacao);
                    output +=
                        `<tr class="position-relative">
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox${cont++}" name="options[]" value="1">
                                     <label for="checkbox${cont++}"></label>
                                </span>
                            </td>                           
                            <td> 
                                <a href="#">
                                    <u>` + data.cod_usuario + `</u>
                                </a>                                    
                            </td>
                            <td>` + data.nome + `</td>
                            <td>` + data.servico + `</td>
                            <td>` + newData + `</td>
                            <td>
                                <a href="#editModal" class="edit" data-toggle="modal">
                                     <i class="material-icons" data-toggle="tooltip" title="" 
                                     data-original-title="Edit">edit</i>
                                </a>
                                <a href="#showModal" class="show" data-toggle="modal">
                                     <i class="material-icons" data-toggle="tooltip" title="" 
                                     data-original-title="Show">description</i>
                                </a>
                                <a href="#deleteModal" class="delete" data-toggle="modal">
                                    <i class="material-icons" data-toggle="tooltip" title="" 
                                    data-original-title="Delete">delete</i>
                                </a>
                            </td>
                        </tr>`;
                }
            );

            output +=
                `
                    </tbody>
                </table>`;

            document.getElementById('table-title')
                .insertAdjacentHTML('afterend', output);
        }
    }
)(document);