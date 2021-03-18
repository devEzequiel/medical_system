<div class="modal fade" id="aba_funcio" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Resgistrar Funcionario</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="save-emp" method="get" action="././scripts/insert.emp.php">
                <div class="modal-body">
                    <label for="nome_f" class="sr-only">Nome</label>
                    <input type="text" name="name" id="nome_f" class="name_modal clean" placeholder="Insira o nome" required/>
                    
                    <label for="esp_f" class="sr-only"></label>
                    <select name="role" id="esp_f" class="esp_modal clean" required>
                        <option value="" disabled selected>Selecione Uma Alocação ...</option>
                        <option value="Limpeza" required>Limpeza</option>
                        <option value="Recepção" required>Recepção</option>
                        <option value="Copa" required>Copa</option>
                        <option value="Almoxarifado" required>Almoxarifado</option>
                        <option value="Segurança" required>Segurança</option>
                        <option value="Motorista" required>Motorista</option>
                        <option value="Enfermagem" required>Enfermagem</option>
                    </select>
                    
                    <label for="data_f" class="sr-only">Data de nascimento</label>
                    <input type="text" name="birth" id="data_f" class="data clean" placeholder="Data de nascimento" required/>
                    
                    <label for="cpf_f" class="sr-only"></label>
                    <input type="text"  name="cpf" id="cpf_f" class="cpf_modal clean" placeholder="CPF" required/>
                    
                    <label for="cel_f" class="sr-only"></label>
                    <input type="text" name="phone" id="cel_f" class="cel_modal clean" placeholder="Numero de telefone" required/> 
                    
                    <label for="mail_f" class="sr-only"></label>
                    <input type="email" name="email" id="mail_f" class="mail_modal clean" placeholder="Digte seu email" required/> 
                    
                    <label for="dturno_f" class="sr-only"></label>
                    <select name="turn" id="dturno_f" class="turno_modal clean" required>
                        <option value="" disabled selected>Selecione Um Turno ...</option>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde" >Tarde</option>
                        <option value="Noite" >Noite</option>
                    </select>
                </div>
            
                <div class="modal-footer">
                    <span id="funcio-feedback"></span>
                    <button type="button" class="btn btn-danger fechar" data-dismiss="modal">Fechar</button>
                    <input type="submit" id="insert-emp" class="btn btn-danger" value="Enviar">
                </div>
            </form>
        </div>

    </div>
</div>
