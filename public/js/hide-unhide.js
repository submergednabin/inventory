<script type="text/javascript">

    /*jquery for hiding personal contact at first*/
    $(function(){
    $(".hide-container").hide();
    $(".other-details").on("click", function(){
        $(".case-detail-container").hide(); 
        // $(".others-details-div").show();       
        $(".hide-container").show();
    });
    });

    $(function(){
    $(".case-detail-container").hide();
    $(".case-details").on("click", function(){
        $(".hide-container").hide();
        $(".case-detail-container").show();
    });
    });

    /*jquery to toggle the fa icon ascending and descending*/
    $('.my-fancy-container a').click(function(){
    $(this).next('a').slideToggle('500');
    $(this).find('i').toggleClass('fa-sort-desc fa-sort-asc')
    });

    $(function(){
        $('.show_hide').hide();
        $(document).on('click','.my-icon',function(e){
            e.preventDefault();
            $( ".show_hide" ).toggle();
        });
    });
    $(function(){
        $('.alternate-contact').hide();
        $(document).on('click','.alt-form',function(){
            $( ".alternate-contact" ).toggle();
        });
    });
    $(function(){
        $('.primary-hide-form').hide();
        $(document).on('click','.pri-form',function(){
            $( ".primary-hide-form" ).toggle();
        });
    });
   
    $(function(){
        $('.case-statuses').hide();
        $(document).on('click','.case-form',function(){
            $( ".case-statuses" ).toggle();
        });
    });
    $(function(){
        $('.application-container').hide();
        $(document).on('click','.case-app-form',function(){
            $( ".application-container" ).toggle();
        });
    });
    $(function(){
        $('.address-container').hide();
        $(document).on('click','.address-history-form',function(){
            $( ".address-container" ).toggle();
        });
    });

    $(function(){
        $('.employement-container').hide();
        $(document).on('click','.emp-form',function(){
            $( ".employement-container" ).toggle();
        });
    });

    $(function(){
        $('.academic-container').hide();
        $(document).on('click','.academic-form',function(){
            $( ".academic-container" ).toggle();
        });
    });

    $(function(){
        $('.members-container').hide();
        $(document).on('click','.members-form',function(){
            $( ".members-container" ).toggle();
        });
    });

    $(function(){
        $('.old-passport-container').hide();
        $(document).on('click','.old-passport-form',function(){
            $( ".old-passport-container" ).toggle();
        });
    });
    $(function(){
        $('.other-name-container').hide();
        $(document).on('click','.other-name-form',function(){
            $( ".other-name-container" ).toggle();
        });
    });

    $(function(){
        $('.visa-issue-container').hide();
        $(document).on('click','.visa-issue-form',function(){
            $( ".visa-issue-container" ).toggle();
        });
    });
    $(function(){
        $('.pre-aus-travel-container').hide();
        $(document).on('click','.pre-aus-travel-form',function(){
            $( ".pre-aus-travel-container" ).toggle();
        });
    });
    $(function(){
        $('.pre-other-country-container').hide();
        $(document).on('click','.pre-other-travel-form',function(){
            $( ".pre-other-country-container" ).toggle();
        });
    });

    $(function(){
        $('.character-container').hide();
        $(document).on('click','.character-form',function(){
            $( ".character-container" ).toggle();
        });
    });
    $(function(){
        $('.health-container').hide();
        $(document).on('click','.health-form',function(){
            $( ".health-container" ).toggle();
        });
    });
    $(function(){
        $('.language-container').hide();
        $(document).on('click','.language-form',function(){
            $( ".language-container" ).toggle();
        });
    });

    $(function(){
        $('.police-container').hide();
        $(document).on('click','.police-form',function(){
            $( ".police-container" ).toggle();
        });
    });
    $(function(){
        $('.medical-container').hide();
        $(document).on('click','.medical-form',function(){
            $( ".medical-container" ).toggle();
        });
    });
    $(function(){
        $('.pre-relation-container').hide();
        $(document).on('click','.pre-relation-form',function(){
            $( ".pre-relation-container" ).toggle();
        });
    });
    $(function(){
        $('.task-container').hide();
        $(document).on('click','.task-form',function(){
            $( ".task-container" ).toggle();
        });
    });
</script>