<script src="{{asset('letsbab/shop/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('letsbab/shop/js/popper.js')}}"></script>
<script src="{{asset('letsbab/shop/affil/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('letsbab/shop/affil/assets/js/propeller.js')}}"></script>
<script src="{{asset('letsbab/shop/affil/assets/js/jquery.masonry.min.js')}}" language="javascript" type="text/javascript"></script>
<script>
$(document).ready(function() {
    var lb_current_prod_path = "";
    //var lb_current_json_path = "{{asset('letsbab/shop/affil/data/farfetch-women-new.json')}}";
    var lb_current_json_path = "../letsbab/shop/affil/data/{{$affil_initial_category_json }}";
    
    var lb_init_prods_gallery = 20;

    var sPath=window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    $(".pmd-sidebar-nav").each(function(){
        $(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
        $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
        $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
        $(this).find("a[href='"+sPage+"']").addClass("active");
    });
    $(".auto-update-year").html(new Date().getFullYear());



    function createAndAppendCardToGallery(index, item) {
        var additionlText = item.additional_text ? `<h2 class="pmd-card-title-text cut-text">${item.additional_text}</h2>` : '';
        var price = isNaN(item.price)? item.price : '£' + item.price;
        var box = `
            <div class="grid-item col-lg-4 col-md-4 col-sm-6 col-xs-12 masonry-column">
            <div class="pmd-card pmd-card-default pmd-z-depth ">
                
                <div class="pmd-card-media">
                    <img src="${item.image}" class="img-responsive" data-target="#center-dialog" data-toggle="modal" data-image="${item.image}" data-url="${item.url}" data-name="${item.name}" data-price="${price}">
                </div>
                <div class="pmd-card-title">
                    ${additionlText}
                    <div class="pmd-card-subtitle-text cut-text">${item.name}</div>
                </div>
                <div class="pmd-card-body">
                    <span class="pmd-card-subtitle-text">${price}</span>
                </div>
                <div class="pmd-card-actions">
                    <button data-target="#center-dialog" data-toggle="modal" data-image="${item.image}" data-url="${item.url}" data-name="${item.name}" data-price="${price}" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i
                            class="material-icons pmd-sm">share</i></button>
                    <button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i
                            class="material-icons pmd-sm">thumb_up</i></button>
                    <button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i
                            class="material-icons pmd-sm">favorite</i></button>
                </div>
            </div>
            </div>
            `;
        // only append if item contains data
        if(Object.keys(item).length >0)
            $('.prodgallery').append(box);
    }

    function createGalleryCards(test, index, item) {
        if (test)
            createAndAppendCardToGallery(index, item);
    }

    // first time - load the category products (i.e. once page loaded)
    $.getJSON(lb_current_json_path, function (data) {
        $.each(data, function (index, item) {
            createGalleryCards(index < lb_init_prods_gallery, index, item);
        });
        // first time load, so category changed
        // get category path to show in bread crum
        var cat_path = '{{ $affil_store['storeCategories'][0]['category'] }}';
        cat_path += '|' + '{{ $affil_store['storeCategories'][0]['categoryChildren'][0]['category'] }}';

        var evnt = new CustomEvent('categoryChanged',{detail:{jsonFile: lb_current_json_path,fullCategoryPath: cat_path}});
        document.dispatchEvent(evnt);

        // first time gallery cards created
        var evnt2 = new CustomEvent('productsDisplayed',{detail:{start: 1,total: data.length, end: lb_init_prods_gallery}});
        document.dispatchEvent(evnt2);
        console.log('dispatched',evnt2);

    });

    // load more category items on next button click
    $('.next').on('click', function (event) {
        event.preventDefault();
        var galleryLength = $('.prodgallery .grid-item').length;
        $.ajax(lb_current_json_path, {
            success: function (data) {
                $.each(data, function (index, item) {
                    //console.log(index + ' - ' + item + ' - ' + item.id )
                    createGalleryCards(index >= galleryLength && index < galleryLength + lb_init_prods_gallery, index, item);
                });
                // next set of products to load
                var evnt = new CustomEvent('productsDisplayed',{detail:{start: galleryLength,total: data.length, end: galleryLength + lb_init_prods_gallery}});
                document.dispatchEvent(evnt);
                console.log('dispatched',evnt);
            },
            beforeSend: function () {
                //$('.next').hide();
                //$('.spinner').fadeIn();
            },
            complete: function () {
                //$('.spinner').hide();
                //$('.next').fadeIn();
            }
        });
    });
    // Masonary
    $('#card-masonry').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });
    
    $('.cat-links').on('click',function(event){
        event.preventDefault();
        var jsonFile = $(this).data('json');
        var categoryPath = $(this).data('categorypath');
        var tmpFilePath = "{{asset('letsbab/shop/affil/data/placeholder.json')}}";
        lb_current_json_path = tmpFilePath.replace('placeholder.json',jsonFile);
        
        //console.log($(this).data('json'));
        //console.log("new path:\n" + tmpFilePath);

        $('.prodgallery').empty();
        $.getJSON(lb_current_json_path, function (data) {
            $.each(data, function (index, item) {
                createGalleryCards(index < lb_init_prods_gallery, index, item);
            });
            // productsLoaded afresh for new cat
            var evnt = new CustomEvent('productsDisplayed',{detail:{start: 1,total: data.length, end: lb_init_prods_gallery}});
            document.dispatchEvent(evnt);
        });

        // new category clicked
        var evnt2 = new CustomEvent('categoryChanged',{detail:{jsonFile: lb_current_json_path,fullCategoryPath: categoryPath}});
        document.dispatchEvent(evnt2);

        //console.log({jsonFile: lb_current_json_path,fullCategoryPath: categoryPath});

    });

    



    // for modal dialog to show images (which was clicked)
    $('#center-dialog').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var image = button.data('image'); // info is in data-* attributes
        var url = button.data('url');
        var name = button.data('name');
        var price = button.data('price');
        var modal = $(this);
        modal.find('.modal-prod-name').text(name);
        modal.find('.modal-prod-img').attr('src',image);
        modal.find('.modal-price').text(price);
        lb_current_prod_path = button.data('url');
        
    });

    $('#center-dialog').on('hidden.bs.modal', function () {
        lb_current_prod_path = "";
    });

    // for enabling button on webapp
    try{
        setInterval(function() {
            window.parent.postMessage(JSON.stringify({
                id: "__JS_LB__",
                type: "jsLBMessage",
                message: lb_current_prod_path
            }), "*");
        },700);
    } catch(err){}


    // whenever categoryChanged happens, make updates whereever necessary
    document.addEventListener('categoryChanged',function(event){
        // bread crums'
        catParts = event.detail.fullCategoryPath ? event.detail.fullCategoryPath.split('|'):[''];
        document.querySelector('.breadcrumb li:nth-child(1) a').innerText = catParts[0];
        document.querySelector('.breadcrumb li:nth-child(2)').innerText = catParts.length>1? catParts[1]:'';
        $('h1.section-title span').text(catParts[0]);
        //
        
    });

    // whenever products are loaded ..
    document.addEventListener('productsDisplayed',function(event){
        // update load more text
        if(event.detail.end >= event.detail.total){
            $('.next').hide();
             $('.next-button-desc').hide(); 
        }
        else{
            $('.next-button-desc').text(`Viewed ${event.detail.end} of ${event.detail.total} products`);
            $('.next').show();
            $('.next-button-desc').show(); 
        }
        //console.log(event);
    });


}); //ready end

</script> 
