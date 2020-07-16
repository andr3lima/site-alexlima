<?php include 'header.php'; ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>CONSULTORIA ONLINE</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h4>Fale conosco</h4>
                        <div class="contact-address">
                            <div class="ca-widget">
                                <div class="cw-icon">
                                    <img src="img/icon/icon-1.png" alt="">
                                </div>
                                <div class="cw-text">
                                    <h5>instagram</h5>
                                    <p>@alexlimapersonal</p>
                                </div>
                            </div>
                            <div class="ca-widget">
                                <div class="cw-icon">
                                    <img src="img/icon/icon-2.png" alt="">
                                </div>
                                <div class="cw-text">
                                    <h5>Phone:</h5>
                                    <p>(81) 99999-9999</p>
                                </div>
                            </div>
                            <div class="ca-widget">
                                <div class="cw-icon">
                                    <img src="img/icon/icon-3.png" alt="">
                                </div>
                                <div class="cw-text">
                                    <h5>Mail</h5>
                                    <p>example@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h4>Mande uma mensagem</h4>
                        <form action="#" id="form-plano">
                            <input type="hidden" id="tipo-plano" value="<?= $_GET['plano'] ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" id="nome-plano" placeholder="Seu nome" required="">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" id="telefone-plano" placeholder="Seu telefone" required="">
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" id="email-plano" placeholder="Seu e-mail" required="">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="peso-plano" placeholder="Seu peso (kg)">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="altura-plano" placeholder="Sua altura (m)">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Descreva seu objetivo" id="msg-plano"></textarea>
                                    <button type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <?php include 'footer.php'; ?>