(function () {

        const URL = `../config/fetch.php`;
        const form = document.getElementById("form");
        const modal = document.getElementById("add-modal");
        const modalTitle = document.getElementById("modal-title");
        const btn_Login = document.getElementById("btn-signIn");
        const btn_submit = document.getElementById("btn-submit");
        const btn_toBack = document.getElementById("btn-toBack");
        const btn_cancel = document.getElementById("btn-cancel");
        const btn_closeModal = document.getElementById("btn-close-modal");
        const btn_addSolicitation = document.getElementById("btn-add-solicitation");
        const steps = document.getElementsByClassName("step");

        let currentStep;
        let nextStep;
        let count = 0;

        // acessar painel do admin
        btn_Login.addEventListener("click", function () {
            window.location = "dashboard";
        });

        //se fechar modal, resetar campos do form
        btn_closeModal.addEventListener("click", reload);

        //se cancelar modal, resetar campos do form
        btn_cancel.addEventListener("click", reload);

        btn_addSolicitation.addEventListener("click", function () {
            updateStep();
            setAttributeRequired();
            changeDisplayValue([btn_toBack]);
        });

        btn_toBack.addEventListener("click", function () {
            removeAttributeRequired();
            previousDisplay();
            handlePreviousStep();
        });

        form.addEventListener("submit", function (event) {
            event.preventDefault();
            handleNextStep();
        });

        function handlePreviousStep() {
            if (btn_submit.textContent === "Enviar") {
                btn_submit.innerText = "Próximo";
            }
            switch (currentStep.id) {
                case "step1":
                    modalTitle.innerText = "Etapa 1: (Definir Usuário)";
                    changeDisplayValue([btn_toBack]);
                    break;
                case "step2":
                    modalTitle.innerText = "Etapa 2: (Informe seus dados pessoais)";
                    // changeDisplayValue([btn_toBack]);
                    break;
                case "step3":
                    modalTitle.innerText = "Etapa 3: (Faça seu pedido de suporte)";
                    break;
            }
        }

        function handleNextStep() {
            if (btn_submit.innerText === "Próximo") {//acabou as etapas?
                nextDisplay();
                setAttributeRequired();
                switch (currentStep.id) {
                    case "step2":
                        modalTitle.innerText = "Etapa 2: (Informe seus dados pessoais)";
                        changeDisplayValue([btn_toBack]);
                        break;
                    case "step3":
                        modalTitle.innerText = "Etapa 3: (Faça seu pedido de suporte)";
                        break;
                    case "step4"://step
                        currentStep.innerHTML = getDivConfirmationStep(getFormData(this));//step4
                        modalTitle.innerHTML = "Etapa 4: (Confirmar Dados)";
                        btn_submit.innerText = "Enviar";
                        modal.setAttribute("dismiss-modal", "modal");
                        break;
                }
            } else {
                const solicitation = JSON.parse(sessionStorage.getItem("formSolicitation"));
                post(solicitation);
                sessionStorage.clear();
                reload();
            }
        }

        function reload() {
            location.reload();
        }

        function updateStep() {
            currentStep = steps[count];
            nextStep = currentStep.nextElementSibling;
        }

        function previousDisplay() {
            count--;
            updateStep();
            changeDisplayValue([currentStep, nextStep]);
        }

        function nextDisplay() {
            changeDisplayValue([currentStep, nextStep]);
            count++;
            updateStep();
        }

        function setAttributeRequired() {
            const fields = [
                currentStep.getElementsByTagName("input"),
                currentStep.getElementsByTagName("select")
            ];
            fields.forEach(field => {
                for (const element of field) {
                    element.required = true;
                    setCustomValidity(element);
                }
            });
        }

        function removeAttributeRequired() {
            const fields = [
                currentStep.getElementsByTagName("input"),
                currentStep.getElementsByTagName("select")
            ];
            fields.forEach(field => {
                for (const element of field) {
                    element.required = false;
                }
            });
        }

        function setCustomValidity(element) {
            element.oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("Este campo deve ser preenchido");
                }
            };
            element.oninput = function (e) {
                e.target.setCustomValidity("");
            };
        }

        //altera o valor do display de um ou mais elementos [div1, div2,...]
        function changeDisplayValue(div) {
            div.forEach(div => {
                const currentStyle = div.style.display;
                div.style.display = currentStyle === "none" ? "block" : "none";
            });
        }

        function getFormData(contextForm) {
            const formData = new FormData(contextForm).entries();
            formData.append("date", time());
            //converter formData em um objeto js válido
            const data = Array.from(formData).reduce((memo, pair) => ({
                ...memo,//spread
                [pair[0]]: pair[1],
            }), {});
            sessionStorage.setItem("formSolicitation", JSON.stringify(data));
            return data;
        }

        function time() {
            const today = new Date();
            const day = today.getDate();
            const year = today.getFullYear();
            const month = today.getMonth();
            const hours = today.getHours();
            const minutes = today.getMinutes();
            const seconds = today.getSeconds();
            return year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
        }

        function post(solicitation) {
            fetch(URL,
                {
                    method: "POST",
                    headers: {
                        "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
                    },
                    body: "json=" + JSON.stringify(solicitation)
                }
            ).then(response => {
                if (response.status === 200) {
                    if (response.text()) {
                        alert("Sua solicitação foi enviada com sucesso");
                    } else {
                        alert("Falha ao enviar solicitação de serviço")
                    }
                    // document.getElementById('outputCheck').innerHTML = elementOutput;
                } else if (response.status === 403)
                    console.log("Access denied");
                else if (response.status === 404)
                    console.log("Page not found");
                else if (response.status === 500)
                    console.log("Error insert Database(Code)");
                else if (response.status === 503)
                    console.log("Be right back");
            }).catch(error => console.error(error));
        }

        function checkValidateFormData(form_data) {
            // console.log(input.checkValidity());
            // console.log(input.reportValidity());
            // if (nome == null || nome.indexOf(" ") >= 0 || nome === "") {
            //     document.getElementById('nome').setCustomValidity('Preencha este campo corretamente');
            // } else {
            //
            // }
        }

        function getDivConfirmationStep(solicitation) {
            return `<table id="user_data" class="table responsive-table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Código </th>
                                <th> Nome </th>
                                <th>Serviço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="position-relative">
                                <td>` + solicitation.inputCodeUser + `</td>
                                <td>` + solicitation.inputName + `</td>
                                <td>` + solicitation.inputService + `</td>
                            </tr>
                        </tbody>
                    </table>`;
        }
    }

)(document);