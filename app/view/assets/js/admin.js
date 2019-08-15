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
                console.log("JSON", jsonData);
                if (Object.keys(jsonData).length > 0) {
                    return jsonData.sort(function compare(a, b) {
                        return a.num_solcitacao < b.num_solicitacao ? -1 : a.num_solicitacao > b.num_solicitacao ? 1 : 0;
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
                            <th title="Número da Solicitação">NS</th>
                            <th title="Registro Acadêmico">RA</th>
                            <th>Nome</th>
                            <th>Solicitação</th>
                            <th>Data/Hora</th>
                            <th>Actions</th>                          
                        </tr>
                    </thead>
                    <tbody>`;

            let cont = 0;
            data.map(
                data => {
                    //adaptar data e hora
                    const newData = ds => ((((ds.split(" ")[0])
                            .replace("-", ""))
                            .replace("-", ""))
                            .replace(/(\d{4})(\d{2})(\d{2})/, "$3-$2-$1"))
                        + " / " + ds.split(" ")[1];

                    data.dataSolicitacao = newData(data.dataSolicitacao);

                    output +=
                        `<tr class="position-relative">
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox${cont++}" name="options[]" value="1">
                                     <label for="checkbox${cont++}"></label>
                                </span>
                            </td>          
                            <td>` + data.num_solicitacao + `</td>                 
                            <td> 
                                <a href="#">
                                    <u>` + data.cod_usuario + `</u>
                                </a>                                    
                            </td>
                            <td>` + data.nome + `</td>
                            <td>` + data.servico + `</td>
                            <td>` + data.dataSolicitacao + `</td>
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

            document.getElementById("table-title")
                .insertAdjacentHTML("afterend", output);
        }
    }
)(document);