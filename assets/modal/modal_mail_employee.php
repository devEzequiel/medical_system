<div class="modal fade" id="mail-employee" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Email Funcionario</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <label for="readonly_mail-employee" class="sr-only">Email de redirencionamento</label>
                    <input type="mail" id="readonly_mail-employee" name="readonly_mail-employee" class="form form-control" readonly/>
                    
                    <label for="about_mail-employee" class="sr-only">Assunto do Email</label>
                    <input type="text" id="about_mail-employee" name="about_mail-employee" class="form form-control" placeholder="Assunto do email" required/>

                    <label for="body-mail-employee" class="sr-only">Conteúdo do Email</label>
                    <textarea name="body-mail-employee" id="body-mail-employee" class="form form-control" cols="30" rows="10" placeholder="Conteúdo do Email"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>