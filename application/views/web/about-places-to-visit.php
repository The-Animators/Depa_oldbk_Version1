<!-- Home Design Inner Pages -->
<?php 
    if($client == 'web'){
?>
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase"><?= $pagetitle;?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home Design Inner Pages -->
<?php
        $this->load->view('web/includes/breadcrumb');
    }
?>

<!-- Inner Pages Main Section -->
<section class="ulockd-fservice" <?= $padding ?? '';?>>
    <div class="<?= $container ?? 'container'; ?>">
        <?php if($client == 'web'){ ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Places To Visit</h2>
<!--                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem labore voluptates consequuntur velit necessitatibus maiores fugiat eaque.</p> -->
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row 1">
            <div class="col-md-4 text-center jesal-pir-gate">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">જેસલ પીર ગેટ [Jesal Pir Gate]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center mt-20">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/jesal-pir-gate-1.jpg" data-lightbox="jesal-pir-gate" data-title="જેસલ પીર ગેટ"><img src="<?= base_url();?>assets/web/images/places-to-visit/jesal-pir-gate-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-8 text-center jesal-pir-mandir">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">શ્રી જેસલ પીર દાદા નું મંદિર [Shree Jesal Pir Dada nu Mandir]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/jesal-pir-mandir-1.jpg" data-lightbox="image-1" data-title="શ્રી જેસલ પીર દાદા નું મંદિર"><img src="<?= base_url();?>assets/web/images/places-to-visit/jesal-pir-mandir-1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/jesal-pir-mandir-2.jpg" data-lightbox="image-1" data-title="શ્રી જેસલ પીર દાદા નું મંદિર"><img src="<?= base_url();?>assets/web/images/places-to-visit/jesal-pir-mandir-2.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
                        
        </div>
        <div class="row 2">
            
            <div class="col-md-8 text-center hingraj-mata">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">હિંગરાજ માતા - જેસલ પીર દાદા ના મંદિર માં [Hingraj Mata - In Jesal Pir Dada na Mandir]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/hingraj-mata-1.jpg" data-lightbox="hingraj-mata" data-title="હિંગરાજ માતા - જેસલ પીર દાદા ના મંદિર માં"><img src="<?= base_url();?>assets/web/images/places-to-visit/hingraj-mata-1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/hingraj-mata-2.jpg" data-lightbox="hingraj-mata" data-title="હિંગરાજ માતા - જેસલ પીર દાદા ના મંદિર માં"><img src="<?= base_url();?>assets/web/images/places-to-visit/hingraj-mata-2.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center hanuman-mandir">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">હનુમાન મંદિર - જેસલ પીર દાદા ના મંદિર ની બાજુમા [Hanuman Mandir - Near Jesal Pir Dada Mandir]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/hanuman-mandir_1-1.jpg" data-lightbox="hanuman-mandir" data-title="હનુમાન મંદિર - જેસલ પીર દાદા ના મંદિર ની બાજુમા"><img src="<?= base_url();?>assets/web/images/places-to-visit/hanuman-mandir_1-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 3">
            <div class="col-md-8 text-center kashi-mahadev-mandir">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">કાશી મહાદેવ મંદિર [Kashi Mahadev Mandir]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/kashi-mahadev-mandir-1.jpg" data-lightbox="kashi-mahadev-mandir" data-title="કાશી મહાદેવ મંદિર"><img src="<?= base_url();?>assets/web/images/places-to-visit/kashi-mahadev-mandir-1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/kashi-mahadev-mandir-2.jpg" data-lightbox="kashi-mahadev-mandir" data-title="કાશી મહાદેવ મંદિર"><img src="<?= base_url();?>assets/web/images/places-to-visit/kashi-mahadev-mandir-2.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center shakti-mata">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">શક્તિ માતા [Shakti Mata]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center mt-20">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/shakti-mata-1.jpg" data-lightbox="shakti-mata" data-title="શક્તિ માતા"><img src="<?= base_url();?>assets/web/images/places-to-visit/shakti-mata-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 4">
            <div class="col-md-4 text-center bawaji-ni-samadhi">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">બાવાજી ની સમાધિ - જેસલ પીર દાદા મંદિર [Bawaji Ni Samadhi - Jesal Pir Dada Mandir]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center mt-20">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/bawaji-ni-samadhi-1.jpg" data-lightbox="bawaji-ni-samadhi" data-title="બાવાજી ની સમાધિ - જેસલ પીર દાદા મંદિર"><img src="<?= base_url();?>assets/web/images/places-to-visit/bawaji-ni-samadhi-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-8 text-center gaushala">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ગૌશાળા [Gaushala] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/gaushala-1.jpg" data-lightbox="gaushala" data-title="ગૌશાળા"><img src="<?= base_url();?>assets/web/images/places-to-visit/gaushala-1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/gaushala-2.jpg" data-lightbox="gaushala" data-title="ગૌશાળા"><img src="<?= base_url();?>assets/web/images/places-to-visit/gaushala-2.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 5">
            <div class="col-md-4 text-center gaushala-full">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ગૌશાળા પૂર્ણ ચિત્ર / ગૌશાળા [Gaushala Full Picture]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/gaushala-full-1.jpg" data-lightbox="gaushala-full" data-title="ગૌશાળા પૂર્ણ ચિત્ર / ગૌશાળા"><img src="<?= base_url();?>assets/web/images/places-to-visit/gaushala-full-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center cattle-feed-storage">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">પશુધન ફીડ સ્ટોરેજ વેરહાઉસ [Cattle Feed storage warehouse]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/cattle-feed-storage-1.jpg" data-lightbox="cattle-feed-storage" data-title="પશુધન ફીડ સ્ટોરેજ વેરહાઉસ"><img src="<?= base_url();?>assets/web/images/places-to-visit/cattle-feed-storage-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center bus-stop">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">બસ સ્ટોપ [Bus Stop]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/bus-stop-1.jpg" data-lightbox="bus-stop" data-title="બસ સ્ટોપ"><img src="<?= base_url();?>assets/web/images/places-to-visit/bus-stop-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 5">
            <div class="col-md-4 text-center pani-nu-pyayu">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">પશુઓ માટે પીવાનું પાણી, બસ સ્ટોપ સામે [Water for Cattle opp Bus Stop]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/pani-nu-pyayu-1.jpg" data-lightbox="pani-nu-pyayu" data-title="પશુઓ માટે પીવાનું પાણી, બસ સ્ટોપ સામે"><img src="<?= base_url();?>assets/web/images/places-to-visit/pani-nu-pyayu-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center angan-wadi">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">આંગણ વાડી [Angan Wadi]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/angan-wadi-1.jpg" data-lightbox="angan-wadi" data-title="આંગણ વાડી"><img src="<?= base_url();?>assets/web/images/places-to-visit/angan-wadi-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center hanuman-mandir_2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">હનુમાન મંદિર 2 [Hanuman Temple 2]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/hanuman-mandir_2-1.jpg" data-lightbox="hanuman-mandir_2" data-title="હનુમાન મંદિર 2"><img src="<?= base_url();?>assets/web/images/places-to-visit/hanuman-mandir_2-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 6">
            <div class="col-md-8 text-center bhojan-shala">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ભોજનશાળા [Bhojan Shala]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/bhojan-shala-1.jpg" data-lightbox="bhojan-shala" data-title="ભોજનશાળા"><img src="<?= base_url();?>assets/web/images/places-to-visit/bhojan-shala-1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/bhojan-shala-2.jpg" data-lightbox="bhojan-shala" data-title="ભોજનશાળા"><img src="<?= base_url();?>assets/web/images/places-to-visit/bhojan-shala-2.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center meethi-vav">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">મીઠી વાવ [Meethi Vav]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center mt-20">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/meethi-vav-1.jpg" data-lightbox="meethi-vav" data-title="મીઠી વાવ"><img src="<?= base_url();?>assets/web/images/places-to-visit/meethi-vav-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 7">
            <div class="col-md-12 text-center athithi-gruh">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">અતિથિ ગૃહ [Athithi Gruh]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/athithi-gruh-1.jpg" data-lightbox="athithi-gruh" data-title="અતિથિ ગૃહ"><img src="<?= base_url();?>assets/web/images/places-to-visit/athithi-gruh-1.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-md-4 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/athithi-gruh-2.jpg" data-lightbox="athithi-gruh" data-title="અતિથિ ગૃહ"><img src="<?= base_url();?>assets/web/images/places-to-visit/athithi-gruh-2.jpg" class="img-responsive"></a>
                            </div>
                            <div class="col-md-4 col-xs-12 text-center mt-10">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/athithi-gruh-3.jpg" data-lightbox="athithi-gruh" data-title="અતિથિ ગૃહ"><img src="<?= base_url();?>assets/web/images/places-to-visit/athithi-gruh-3.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 8">
            <div class="col-md-4 text-center mukhya-pravesh-dwar">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ડેપા ગામ મુખ્ય પ્રવેશ દ્વાર [Depa Gaam Mukhya Pravesh Dwar ]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/mukhya-pravesh-dwar-1.jpg" data-lightbox="mukhya-pravesh-dwar" data-title="ડેપા ગામ મુખ્ય પ્રવેશ દ્વાર"><img src="<?= base_url();?>assets/web/images/places-to-visit/mukhya-pravesh-dwar-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center maroo-momay-mata-nu-sthan">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">મારૂ - મોમાઈ માતાજી નું સ્થાન [Maru - Momay Mata nu Sthan] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/maroo-momay-mata-nu-sthan-1.jpg" data-lightbox="maroo-momay-mata-nu-sthan" data-title="મારૂ - મોમાઈ માતાજી નું સ્થાન"><img src="<?= base_url();?>assets/web/images/places-to-visit/maroo-momay-mata-nu-sthan-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center gram-panchayat-office">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ગ્રામ પંચાયત કચેરી [Gram Panchayat office] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/gram-panchayat-office-1.jpg" data-lightbox="gram-panchayat-office" data-title="ગ્રામ પંચાયત કચેરી"><img src="<?= base_url();?>assets/web/images/places-to-visit/gram-panchayat-office-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 9">
            <div class="col-md-4 text-center library-dawakhana">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">લાઇબ્રેરી + દવાખાના [Library + Dawakhana]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/library-dawakhana-1.jpg" data-lightbox="library-dawakhana" data-title="લાઇબ્રેરી + દાવખાના"><img src="<?= base_url();?>assets/web/images/places-to-visit/library-dawakhana-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center furia-amba-mataji-nu-sthan">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ફુરિયા - અંબા માતાજી નું સ્થાન [Furia - Amba Mataji nu Sthan] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/furia-amba-mataji-nu-sthan-1.jpg" data-lightbox="furia-amba-mataji-nu-sthan" data-title="ફુરિયા - અંબા માતાજી નું સ્થાન"><img src="<?= base_url();?>assets/web/images/places-to-visit/furia-amba-mataji-nu-sthan-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center ashapura-mataji-mandir">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">આશાપુરા માતાજી નું મંદિર [Ashapura Mataji Nu Mandir] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/ashapura-mataji-mandir-1.jpg" data-lightbox="ashapura-mataji-mandir" data-title="આશાપુરા માતાજી નું મંદિર"><img src="<?= base_url();?>assets/web/images/places-to-visit/ashapura-mataji-mandir-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 10">
            <div class="col-md-4 text-center mhajan-vessel-room">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">મહાજનનો વાસણોનો ઓરડો [Mhajan Vessel store room ]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/mhajan-vessel-room-1.jpg" data-lightbox="mhajan-vessel-room" data-title="મહાજનનો વાસણોનો ઓરડો"><img src="<?= base_url();?>assets/web/images/places-to-visit/mhajan-vessel-room-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center motu-sthanak">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">મોટું સ્થાનક [Motu Sthanak]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/motu-sthanak-1.jpg" data-lightbox="motu-sthanak" data-title="મોટુ સ્થાનક"><img src="<?= base_url();?>assets/web/images/places-to-visit/motu-sthanak-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center nanu-sthanak">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">નાનું સ્થાનક [Nanu Sthanak]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/nanu-sthanak-1.jpg" data-lightbox="nanu-sthanak" data-title="નાનું સ્થાનક"><img src="<?= base_url();?>assets/web/images/places-to-visit/nanu-sthanak-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 11">
            <div class="col-md-4 text-center gala-vishal-mata-nu-sthan">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ગાલા - વિસલ માતાજી નું સ્થાન [Gala - Vishal mata nu Sthan]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/gala-vishal-mata-nu-sthan-1.jpg" data-lightbox="gala-vishal-mata-nu-sthan" data-title="ગાલા - વિસલ માતાજી નું સ્થાન"><img src="<?= base_url();?>assets/web/images/places-to-visit/gala-vishal-mata-nu-sthan-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center chheda-vishal-mata-nu-sthan">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold"> [Medap Pir] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/chheda-vishal-mata-nu-sthan-1.jpg" data-lightbox="chheda-vishal-mata-nu-sthan" data-title="છેડા - ખેતલપાલ દાદા નું સ્થાન"><img src="<?= base_url();?>assets/web/images/places-to-visit/chheda-vishal-mata-nu-sthan-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center hanuman-mandir_3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">હનુમાન મંદિર 3 [Hanuman Temple 3]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/hanuman-mandir_3-1.jpg" data-lightbox="hanuman-mandir_3" data-title="હનુમાન મંદિર 3"><img src="<?= base_url();?>assets/web/images/places-to-visit/hanuman-mandir_3-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 12">
            <div class="col-md-4 text-center nishar-school">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">નિશાળ (શાળા) [School]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/nishar-school-1.jpg" data-lightbox="nishar-school" data-title="નિશાળ (શાળા)"><img src="<?= base_url();?>assets/web/images/places-to-visit/nishar-school-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center savla-sagat-mata-nu-sthan">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">સાવલા - સગત માતાજી નું સ્થાન [Savla - Sagat Mata nu sthan] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/savla-sagat-mata-nu-sthan-1.jpg" data-lightbox="savla-sagat-mata-nu-sthan" data-title="સાવલા - સગત માતાજી નું સ્થાન"><img src="<?= base_url();?>assets/web/images/places-to-visit/savla-sagat-mata-nu-sthan-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center vad-nani-talavdi">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">વડ નાની તલાવડી [Vad Nani Talavdi] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/vad-nani-talavdi-1.jpg" data-lightbox="vad-nani-talavdi" data-title="વડ નાના તલાવડી"><img src="<?= base_url();?>assets/web/images/places-to-visit/vad-nani-talavdi-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 13">
            <div class="col-md-4 text-center nani-talavdi">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">નાની તલાવડી [Nani Talavdi]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/nani-talavdi-1.jpg" data-lightbox="nani-talavdi" data-title="નાના તલાવડી"><img src="<?= base_url();?>assets/web/images/places-to-visit/nani-talavdi-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center shitla-mataji-nu-mandir">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">શીતળા માતાજી નું મંદિર - નાની તલાવડી [Shitla Mataji nu Mandir - Nani Talavdi] </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/shitla-mataji-nu-mandir-1.jpg" data-lightbox="shitla-mataji-nu-mandir" data-title="શીતળા માતાજી નું મંદિર - નાના તલાવડી"><img src="<?= base_url();?>assets/web/images/places-to-visit/shitla-mataji-nu-mandir-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center chabutro">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ચબૂતરો [Chabutro]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/chabutro-1.jpg" data-lightbox="chabutro" data-title="ચબૂતરો"><img src="<?= base_url();?>assets/web/images/places-to-visit/chabutro-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row 14">
            <div class="col-md-4 text-center depa-talav-motu">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">ડેપાસર તલાવ - મોટું [Depasar Talav Motu]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/depa-talav-motu-1.jpg" data-lightbox="depa-talav-motu" data-title="દેપાસર તલાવ - મોટું"><img src="<?= base_url();?>assets/web/images/places-to-visit/depa-talav-motu-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center morarsa-pir-ni-dargah">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">મોરારસા પીર ની દરગાહ [Morarsa Pir ni Dargah]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/morarsa-pir-ni-dargah-1.jpg" data-lightbox="morarsa-pir-ni-dargah" data-title="મોરારસા પીર ની દરગાહ"><img src="<?= base_url();?>assets/web/images/places-to-visit/morarsa-pir-ni-dargah-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center bapa-sitaram">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">બાપ્પા સીતારામ [Bappa Sitaram]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/bapa-sitaram.jpg" data-lightbox="bapa-sitaram" data-title=" "><img src="<?= base_url();?>assets/web/images/places-to-visit/bapa-sitaram.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4 text-center vividh-lakshi-hall">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title bold">વિવિદલક્ષી / કોમ્યુનિટી હોલ [Vividh Lakshi Hall]</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center">
                                <a href="<?= base_url();?>assets/web/images/places-to-visit/vividh-lakshi-hall-1.jpg" data-lightbox="vividh-lakshi-hall" data-title="વિવિદલક્ષી હોલ"><img src="<?= base_url();?>assets/web/images/places-to-visit/vividh-lakshi-hall-1.jpg" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        
    </div>
</section>
