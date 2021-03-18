<div class="modal fade" id="aba_medica" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Resgistrar Medico</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="<?php echo BASE_URL?>scripts/insert.doctor.php" method="get" id="doctor-modal">
                <div class="modal-body">
                    <label for="nome" class="sr-only">Nome</label>
                    <input minlength="4" type="text" name="name" id="nome" class="name_modal clean" placeholder="Insira o nome" required>
                    
                    <label for="esp" class="sr-only">Especialidade</label>
                    <select name="espec" id="esp" class="esp_modal clean" required>
                        <option value="" disabled selected>Selecione Uma Especialidade ...</option>
                        <option value="Cirurgião" >Cirurgião</option>
                        <option value="Pediatra" >Pediatra</option>
                        <option value="Neurologista" >Neurologista</option>
                        <option value="Anestesista" >Anestesista</option>
                        <option value="Dermatologista" >Dermatologista</option>
                        <option value="Cardiologista" >Cardiologista</option>
                        <option value="Ortopedista" >Ortopedista</option>
                        <option value="Otorrinolaringologista" >Otorrinolaringologista</option>
                        <option value="Endocrinologista" >Endocrinologista</option>
                        <option value="Outro" >Outro</option>
                    </select>

                    <label for="crm_m" class="sr-only">CRM</label> 
                    <input type="text" name="crm" id="crm_m" class="crm_modal clean" placeholder="Digite o CRM" minlength="4"  required/>
                    
                    <label for="cpf_m" class="sr-only">CPF</label>
                    <input type="varchar" name="cpf" id="cpf_m" class="cpf_modal clean" placeholder="CPF" minlength="11"  required/>
                    
                    <label for="cel_m" class="sr-only">Numero de Telefone</label>
                    <input type="text" name="phone" id="cel_m" class="cel_modal clean" placeholder="Numero de telefone" minlength="9"  required/> 
                    
                    <label for="mail_m" class="sr-only">Email</label> 
                    <input type="email" name="email" id="mail_m" class="mail_modal clean" placeholder="Digte seu email" minlength="8" required/> 
                    
                    <label for="turno_m" class="sr-only">Turno</label>
                    <select name="turn" id="turno_m" class="turno_modal clean" required>
                        <option value="" disabled selected>Selecione Um Turno ...</option>
                        <option value="Manha" >Manhã</option>
                        <option value="Tarde" >Tarde</option>
                        <option value="Noite" >Noite</option>
                    </select>
                    
                </div>
            
                <div class="modal-footer">
                    <span id="medic-feedback"></span>
                    <button type="submit" class="btn btn-danger fechar" data-dismiss="modal">Fechar</button>
                    <input id="sendData" type="submit" class="btn btn-danger " value="Enviar" >
                   
                </div>
            </form>
        </div>

    </div>
</div>
