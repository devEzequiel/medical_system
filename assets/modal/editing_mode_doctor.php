<div class="modal fade" id="doctor_editor" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Resgistro Médico</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="input-medic">
                <div class="modal-body">
                    <input type="text" name="editor_name_m" id="nomem" class="name_modal" placeholder="Insira o nome" required/>
                    <select name="editor_esp_m" id="espm" class="esp_modal" required>
                        <option value="Cirurgião" required>Cirúrgião</option>
                        <option value="Pediatra" required>Pediatra</option>
                        <option value="Neurologista" required>Neurologista</option>
                        <option value="Anestesista" required>Anestesista</option>
                        <option value="Dermatologista" required>Dermatologista</option>
                        <option value="Cardiologista" required>Cardiologista</option>
                        <option value="Ortopedista" required>Ortopedista</option>
                        <option value="Otorrinolaringologista" required>Otorrinolaringologista</option>
                        <option value="Endocrinologista" required>Endocrinologista</option>
                        <option value="Outro" required>Outro</option>
                    </select>
                    <input type="text" name="editor_crm_med" id="crm_mm" class="crm_modal" value='' placeholder="Digite o CRM" required/>
                    <input type="text" name="editor_cpf_med" id="cpf_mm" class="cpf_modal cpfid" placeholder="CPF" required/>
                    <input type="text" name="editor_cel_med" id="cel_mm" class="cel_modal" placeholder="Numero de telefone" required/> 
                    <input type="email" name="editor_mail_med" id="mail_mm" class="mail_modal" placeholder="Digte seu email" required/> 
                    <select name="editor_turno_med" id="turno_mm" class="turno_modal" required>
                        <option value="manha" required>Manhã</option>
                        <option value="tarde" >Tarde</option>
                        <option value="noite" >Noite</option>
                    </select>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <input onclick="updateMedic()" type="submit" id="update1" class="btn btn-danger" value="Enviar">
                </div>
            </form>    
        </div>
    </div>
</div>