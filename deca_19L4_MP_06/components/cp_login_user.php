
<section class="bg-light" id="member_details">

    <div class="container py-5">

        <div class="row">
            <div class="col-lg-12 mx-auto">
            </div>
            <div class="col-lg-12 col-12 pb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="text-center mb-4">ENTRAR</h2>
                        <form class="form-horizontal" method="POST" action="scripts/sc_login_control.php">
                            <!-- criei o formulário, com método POST e estou enviando a informação para a página login_control -->
                            <div class="form-group"> <!-- essa parte é para o usuário  -->
                                <label for="inputEmail" class="col-lg-12 control-label">Insira seu email:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="login" id="login" placeholder="Login"
                                           required="required">
                                </div>
                            </div>
                            <div class="form-group"> <!-- essa parte é para a senha -->
                                <label for="inputPassword" class="col-lg-12 control-label">Insira sua Senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Senha"
                                           required="required">
                                </div>
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group"> <!-- essa parte é para o botão de entrar -->
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-default">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>