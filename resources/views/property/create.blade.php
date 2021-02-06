@extends('layouts.masela')

@section('main')
 <div class="px-3">  
            <div class="theme-container">  
                <div class="py-3">
                    <div class="mdc-card p-3"> 
                        <div class="mdc-tab-bar-wrapper submit-property">  
                            <div class="mdc-tab-bar mb-3">
                                <div class="mdc-tab-scroller">
                                    <div class="mdc-tab-scroller__scroll-area">
                                        <div class="mdc-tab-scroller__scroll-content">
                                            <button class="mdc-tab mdc-tab--active" tabindex="0">
                                                <span class="mdc-tab__content">
                                                <span class="mdc-tab__text-label">Basic</span>
                                                </span>
                                                <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                </span>
                                                <span class="mdc-tab__ripple"></span>
                                            </button>
                                            <button class="mdc-tab mdc-tab" tabindex="0">
                                                <span class="mdc-tab__content">
                                                <span class="mdc-tab__text-label">Features</span>
                                                </span>
                                                <span class="mdc-tab-indicator mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                </span>
                                                <span class="mdc-tab__ripple"></span>
                                            </button> 
                                            <button class="mdc-tab mdc-tab" tabindex="0">
                                                <span class="mdc-tab__content">
                                                <span class="mdc-tab__text-label">Pricing/Payment</span>
                                                </span>
                                                <span class="mdc-tab-indicator mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                </span>
                                                <span class="mdc-tab__ripple"></span>
                                            </button> 
                                            <button class="mdc-tab mdc-tab" tabindex="0">
                                                <span class="mdc-tab__content">
                                                <span class="mdc-tab__text-label">Media</span>
                                                </span>
                                                <span class="mdc-tab-indicator mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                </span>
                                                <span class="mdc-tab__ripple"></span>
                                            </button> 
                                            <button class="mdc-tab mdc-tab" tabindex="0">
                                                <span class="mdc-tab__content">
                                                <span class="mdc-tab__text-label">Confirmation</span>
                                                </span>
                                                <span class="mdc-tab-indicator mdc-tab-indicator">
                                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                </span>
                                                <span class="mdc-tab__ripple"></span>
                                            </button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content tab-content--active">  
                                <form action="" id="sp-basic-form" enctype="multipart/form-data" class="row property-create-form">
<!--                                    on edit push the ID to the page and set it's value here-->
<input type="hidden" name="property_id" id="input_propety_id" value="{{ $property_id ?? '' }}">
<input type="hidden" name="current_tab"  value="sp-basic-form">
                                    <div class="col-xs-12 p-3">
                                        <h1 class="fw-500 text-center">Property details</h1>
                                    </div> 
                                    <div class="col-xs-12 p-2" id="warning-list">
                                        
                                    </div>
                                    
                                    <div class="col-xs-12 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <?php
                                            if(!empty($property)){
                                                echo '<input class="mdc-text-field__input" name="title" value="'.$property->name.'" required>';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="title" required>';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Property Title</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div>  
                                   
                                    <div class="col-xs-12 col-sm-6 p-2">
                                        <div class="mdc-select mdc-select--outlined custom-field" id="propety_type">
                                            <input type="hidden" name="type" id="input_propety_type">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">Property Type</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <?php
                                            if(empty($propertyDetail)){?>
                                                <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                    <li class="mdc-list-item" data-value="residential">Residential</li>
                                                    <li class="mdc-list-item" data-value="commercial">Commercial</li>
                                                    <li class="mdc-list-item" data-value="mixed-use">Mixed-use Land</li>
                                                    <?php
                                            }else{
                                                ?>
                                                     <li class="mdc-list-item" data-value=""></li>
                                                    <li class="mdc-list-item @if ($propertyDetail->type === 'residential') mdc-list-item--selected  @endif" data-value="residential">Residential</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->type === 'commercial') mdc-list-item--selected  @endif" data-value="commercial">Commercial</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->type === 'mixed-use') mdc-list-item--selected  @endif" data-value="mixed-use">Mixed-use Land</li>
                                              
                                                    <?php
                                            }
                                            ?>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-xs-12 col-sm-6 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                             <?php
                                            if(!empty($propertyDetail)){
                                                echo '<input class="mdc-text-field__input" name="kms_to_tarmac" step=".1" type="number" value="'.$propertyDetail->kms_to_tarmac.'" >';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="kms_to_tarmac" step=".1" type="number" >';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">kms from tarmac</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
        
                                    </div>  
                                    
                                    
                                    <div class="col-xs-12 col-sm-6 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <?php
                                            if(!empty($propertyDetail)){
                                                $size_acre = $propertyDetail->size_acre;
                                                switch ($propertyDetail->size_acre) {
                                                    case '0.125':
                                                        $size_acre="1/8";
                                                        break;
                                                    case '0.5':
                                                        $size_acre="1/2";
                                                        break;
                                                    case '0.25':
                                                        $size_acre="1/4";
                                                        break;

                                                    default:
                                                        break;
                                                }
                                                
                                                echo '<input class="mdc-text-field__input" name="size_acre" value="'.$size_acre.'"  required>';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="size_acre" required>';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Property size in acres(eg: 1/8 or 5)</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
        
                                    </div>  
                                    
                                   <div class="col-xs-5 col-sm-2 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                             <?php
                                            if(!empty($propertyDetail)){
                                                $feet= "0 by 0";
                                                if(isset($propertyDetail->size_feet)&& $propertyDetail->size_feet!='N/A'){
                                                $feet = $propertyDetail->size_feet;
                                                }
                                                $feetData = explode("by", $feet);
                                                echo '<input class="mdc-text-field__input" name="size_feet_1" type="number" value="'.trim($feetData[0]).'">';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="size_feet_1" type="number">';
                                            }
                                            ?>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">length ft</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
        
                                    </div> 
                                    
                                    <div class="col-xs-2 col-sm-2 p-2">EG: <i>50 by 100</i></div>
                                    
                                    <div class="col-xs-5 col-sm-2 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                             <?php
                                            if(!empty($propertyDetail)){
                                                $feet= "0 by 0";
                                                if(isset($propertyDetail->size_feet)&& $propertyDetail->size_feet!='N/A'){
                                                $feet = $propertyDetail->size_feet;
                                                }
                                                $feetData = explode("by", $feet);
                                                echo '<input class="mdc-text-field__input" name="size_feet_2" type="number" value="'.trim($feetData[1]).'">';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="size_feet_2" type="number">';
                                            }
                                            ?>
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">width ft</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
        
                                    </div>  
                                    
                                    
                                    
                                    <div class="col-xs-12 col-sm-6 p-2">
                                        <div class="mdc-select mdc-select--outlined" id="propety_soil">
                                            <input type="hidden" name="soil" id="input_propety_soil">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">Soil Type</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <?php
                                            if(empty($propertyDetail)){?>
                                                <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                    <li class="mdc-list-item" data-value="red/Loam">Red/Loam (farm like)</li>
                                                    <li class="mdc-list-item" data-value="black cotton">Black cotton</li>
                                                    <li class="mdc-list-item" data-value="sandy">Sandy Soil</li>
                                                    <li class="mdc-list-item" data-value="clay">Clay soil</li>
                                                    <?php
                                            }else{
                                                ?>
                                                     <li class="mdc-list-item" data-value=""></li>
                                                    <li class="mdc-list-item @if ($propertyDetail->soil === 'red/Loam') mdc-list-item--selected  @endif" data-value="red/Loam">Red/Loam (farm like)</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->soil === 'black cotton') mdc-list-item--selected  @endif" data-value="black cotton">Black cotton</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->soil === 'sandy') mdc-list-item--selected  @endif" data-value="sandy">Sandy Soil</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->soil === 'clay') mdc-list-item--selected  @endif" data-value="clay">Clay soil</li>
                                              
                                                    <?php
                                            }
                                            ?>
                                                   
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-xs-12 col-sm-6 p-2">
                                        <div class="mdc-select mdc-select--outlined" id="propety_access_rd_type">
                                            <input type="hidden" name="access_rd_type" id="input_propety_access_rd_type">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">Access Road type</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                     <?php
                                            if(empty($propertyDetail)){?>
                                               <li class="mdc-list-item mdc-list-item--selected" data-value=""></li>
                                                    <li class="mdc-list-item" data-value="tarmac">Tarmac/cabro</li>
                                                    <li class="mdc-list-item" data-value="murram">Murram</li>
                                                    <li class="mdc-list-item" data-value="dirt">Dirt road</li>
                                                    <li class="mdc-list-item" data-value="na">Not applicable</li>
                                                    <?php
                                            }else{
                                                ?>
                                                     <li class="mdc-list-item" data-value=""></li>
                                                    <li class="mdc-list-item @if ($propertyDetail->access_rd_type === 'tarmac') mdc-list-item--selected  @endif" data-value="tarmac">Tarmac/cabro</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->access_rd_type === 'murram') mdc-list-item--selected  @endif" data-value="murram">Murram</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->access_rd_type === 'dirt') mdc-list-item--selected  @endif" data-value="dirt">Dirt road</li>
                                                    <li class="mdc-list-item @if ($propertyDetail->access_rd_type === 'na') mdc-list-item--selected  @endif" data-value="na">Not applicable</li>
                                              
                                                    <?php
                                            }
                                            ?>
                                                   
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    


<div class="col-xs-12 col-sm-6 p-2">
                                        <div class="mdc-select mdc-select--outlined" id="propety_county">
                                            <input type="hidden" name="county_id" id="input_propety_county">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">County</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                      
                                                    <?php
                                            if(!empty($propertyLocation)){
                                                $count_id = $propertyLocation->county_id;
                                                $county = $counties[$count_id];
                                                echo '<li class="mdc-list-item mdc-list-item--selected" data-value="'.$count_id.'">'.$county['name'].'</li>';
                                            }else{
                                                echo '<li class="mdc-list-item mdc-list-item--selected" data-value=""></li>';
                                            }
                                            ?>  
                                                    @foreach ($counties as $key => $county)
    <li class="mdc-list-item" data-value="{{ $county->county_id }}">{{ $county->name }}</li>
@endforeach
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-xs-12 col-sm-6 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                             <?php
                                            if(!empty($propertyLocation)){
                                                echo ' <input class="mdc-text-field__input" name="nearest_town" required value="'.$propertyLocation->nearest_town.'">';
                                            }else{
                                                echo ' <input class="mdc-text-field__input" name="nearest_town" required>';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">What's the nearest town</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
        
                                    </div>  
                                    
                                    <div class="col-xs-12 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <?php
                                            if(!empty($propertyLocation)){
                                                echo '<input class="mdc-text-field__input" name="neighborhood" value="'.$propertyLocation->neighborhood.'">';
                                            }else{
                                                echo ' <input class="mdc-text-field__input" name="neighborhood">';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Location/Neighborhood name</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div>  
                                    
                        
                                    <div class="col-xs-12 p-2 mt-3 end-xs"> 
                                        <button class="mdc-button mdc-button--raised next-tab" type="button">
                                            <span class="mdc-button__ripple"></span> 
                                            <span class="mdc-button__label">Save</span> 
                                            <i class="material-icons mdc-button__icon">navigate_next</i>
                                        </button>  
                                    </div>  
                                </form>  
                            </div> 
                            <div class="tab-content"> 
                                <form action="javascript:void(0);" id="sp-features-form" class="row property-create-form">  
                                    <input type="hidden" name="property_id" id="input_propety_id" value="{{ $property_id ?? '' }}">
                                    <input type="hidden" name="current_tab"  value="sp-features-form">
                                    <div class="col-xs-12 p-3">
                                        <h1 class="fw-500 text-center">Property Features</h1>
                                    </div> 
                                    <div class="col-xs-12 p-2" id="warning-list">
                                        
                                    </div>
                                   
                                    <div class="col-xs-12 col-sm-6 p-2">
                                        <div class="mdc-select mdc-select--outlined" id="propety_water">
                                            <input type="hidden" name="water" id="input_propety_water">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">Piped Water on site?</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <?php
                                            if(!empty($propertyFeature)){
                                                echo '<li class="mdc-list-item mdc-list-item--selected" data-value="'.$propertyFeature->water.'">'.$propertyFeature->water.'</li>';
                                            }else{
                                                echo '<li class="mdc-list-item mdc-list-item--selected" data-value=""></li>';
                                            }
                                            ?>  
                                                    
                                                    <li class="mdc-list-item" data-value="yes">Yes, on site</li>
                                                    <li class="mdc-list-item" data-value="within_neighborhood">Available within the neighborhood</li>
                                                    <li class="mdc-list-item" data-value="no">No</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-6 p-2">
                                        <div class="mdc-select mdc-select--outlined" id="propety_electricity">
                                            <input type="hidden" name="electricity" id="input_propety_electricity">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text"></div>
                                                <div class="mdc-notched-outline">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label">Electricity on site?</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <?php
                                            if(!empty($propertyFeature)){
                                                echo '<li class="mdc-list-item mdc-list-item--selected" data-value="'.$propertyFeature->electricity.'">'.$propertyFeature->electricity.'</li>';
                                            }else{
                                                echo '<li class="mdc-list-item mdc-list-item--selected" data-value=""></li>';
                                            }
                                            ?>  
                                                    
                                                    <li class="mdc-list-item" data-value="yes">Yes, on site</li>
                                                    <li class="mdc-list-item" data-value="within_neighborhood">Within neighborhood</li>
                                                    <li class="mdc-list-item" data-value="no">No</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                      <div class="col-xs-12 mb-2 p-0"> 
                                        <p class="uppercase m-2 fw-500">More Features</p>  
                                        <div class="features">
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <?php
                                            if(!empty($propertyFeature)){
                                                $checked = "";
                                                if($propertyFeature->controlled_development ==1){
                                                    $checked = "checked";
                                                    
                                                }
                                                 echo '<input type="checkbox" '.$checked.' class="mdc-checkbox__native-control" id="controlled_development" name="controlled_development"/>';
                                               
                                            }else{
                                                echo '<input type="checkbox" class="mdc-checkbox__native-control" id="controlled_development" name="controlled_development"/>';
                                            }
                                            ?>  
                                                    
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="controlled_development">Controlled development</label>
                                            </div>    
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                     <?php
                                            if(!empty($propertyFeature)){
                                                $checked = "";
                                                if($propertyFeature->gated_community ==1){
                                                    $checked = "checked";
                                                    
                                                }
                                                 echo '<input type="checkbox" '.$checked.' class="mdc-checkbox__native-control" id="gated_community" name="gated_community"/>';
                                               
                                            }else{
                                                echo '<input type="checkbox" class="mdc-checkbox__native-control" id="gated_community" name="gated_community"/>';
                                            }
                                            ?>  
                                                   
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="gated_community">Gated Community</label>
                                            </div>
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <?php
                                            if(!empty($propertyFeature)){
                                                $checked = "";
                                                if($propertyFeature->ready_title ==1){
                                                    $checked = "checked";
                                                    
                                                }
                                                 echo '<input type="checkbox" '.$checked.' class="mdc-checkbox__native-control" id="ready_title" name="ready_title"/>';
                                               
                                            }else{
                                                echo '<input type="checkbox" class="mdc-checkbox__native-control" id="ready_title" name="ready_title"/>';
                                            }
                                            ?>  
                                                    
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="ready_title">Ready title deed</label>
                                            </div>
                                            
                                            
                                        </div> 
                                    </div>   
                                    
                                    <div class="col-xs-12 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea">
                                            <?php
                                            if(!empty($property)){
                                                echo '<textarea class="mdc-text-field__input" rows="5" name="description">'.$property->description.'</textarea>';
                                            }else{
                                                echo '<textarea class="mdc-text-field__input" rows="5" name="description"></textarea>';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Property Description</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-xs-12 p-2 mt-3 row between-xs"> 
                                        <button class="mdc-button mdc-button--raised prev-tab" type="button">
                                            <span class="mdc-button__ripple"></span> 
                                            <i class="material-icons mdc-button__icon">navigate_before</i>
                                            <span class="mdc-button__label">Back</span>  
                                        </button>
                                        <button class="mdc-button mdc-button--raised next-tab" type="button">
                                            <span class="mdc-button__ripple"></span> 
                                            <span class="mdc-button__label">Save</span> 
                                            <i class="material-icons mdc-button__icon">navigate_next</i>
                                        </button>  
                                    </div>  
                                </form>  
                            </div>
                            <div class="tab-content"> 
                                <form action="javascript:void(0);" id="sp-payments-form" class="row property-create-form"> 
                                    <input type="hidden" name="property_id" id="input_propety_id" value="{{ $property_id ?? '' }}">
                                    <input type="hidden" name="current_tab"  value="sp-payments-form">
                                    <div class="col-xs-12 p-3">
                                        <h1 class="fw-500 text-center">Payments</h1>
                                    </div> 
                                    <div class="col-xs-12 p-2" id="warning-list">
                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-12 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <?php
                                            if(!empty($property)){
                                                echo '<input class="mdc-text-field__input" name="price" type="number" required value="'.$property->price.'">';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="price" type="number" required>';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Property Price</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div> 
                                     <div class="col-xs-12 mb-2 p-0"> 
                                        <p class="uppercase m-2 fw-500">Check where applicable</p>  
                                    </div>
                                    
                                          <div class="col-xs-12 mb-2 p-0"> 
                                        <div class="features">
                                             <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <?php
                                            if(!empty($property)){
                                                 $checked = "";
                                                if($property->negotiable ==1){
                                                    $checked = "checked";
                                                    
                                                }
                                                
                                                echo '<input type="checkbox" '.$checked.' class="mdc-checkbox__native-control" id="negotiable" name="negotiable"/>';
                                            }else{
                                                echo '<input type="checkbox" class="mdc-checkbox__native-control" id="negotiable" name="negotiable"/>';
                                            }
                                            ?>
                                                    
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="installment">negotiable</label>
                                             </div>
                                            
                                            
                                            <!-- comment -->
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <?php
                                            if(!empty($propertyPaymentTerms)){
                                                 $checked = "";
                                                if($propertyPaymentTerms->inclusive_titledeed_processing ==1){
                                                    $checked = "checked";
                                                    
                                                }
                                                
                                                echo '<input type="checkbox" '.$checked.' class="mdc-checkbox__native-control" id="inclusive-title-deed" name="inclusive_titledeed_processing"/>';
                                            }else{
                                                echo '<input type="checkbox" class="mdc-checkbox__native-control" id="inclusive-title-deed" name="inclusive_titledeed_processing"/>';
                                            }
                                            ?>
                                                    
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="inclusive-title-deed">Inclusive of title deed processing</label>
                                            </div>
                                            
                                            <!-- comment -->
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                     <?php
                                            if(!empty($propertyPaymentTerms)){
                                                 $checked = "";
                                                if($propertyPaymentTerms->installment ==1){
                                                    $checked = "checked";
                                                    
                                                }
                                                
                                                echo '<input type="checkbox" '.$checked.' class="mdc-checkbox__native-control" id="installment" name="installment"/>';
                                            }else{
                                                echo '<input type="checkbox" class="mdc-checkbox__native-control" id="installment" name="installment"/>';
                                            }
                                            ?>
                                                    
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <label for="installment">Payable in installments</label>
                                            </div>
                                        </div>
                                          </div>
                                    
                                    <div class="col-xs-12 mb-2 p-0"> 
                                        <p class="uppercase m-2 fw-500">Installments</p>  
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <?php
                                            if(!empty($propertyPaymentTerms)){
                                                 
                                                
                                                echo '<input class="mdc-text-field__input" name="installment_deposit_amount" type="number" value="'.$propertyPaymentTerms->installment_deposit_amount.'">';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="installment_deposit_amount" type="number">';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Required deposit for installments</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <?php
                                            if(!empty($propertyPaymentTerms)){
                                                 
                                                
                                                echo '<input class="mdc-text-field__input" name="installment_months" type="number" value="'.$propertyPaymentTerms->installment_months.'">';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="installment_months" type="number">';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Months to pay the remainder</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-4 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <?php
                                            if(!empty($propertyPaymentTerms)){
                                                 
                                                
                                                echo '<input class="mdc-text-field__input" name="installment_price" type="number" value="'.$propertyPaymentTerms->installment_price.'">';
                                            }else{
                                                echo '<input class="mdc-text-field__input" name="installment_price" type="number">';
                                            }
                                            ?>
                                            
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Property price for installments</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    
                                    
                                  
                                    <div class="col-xs-12 p-2 mt-3 row between-xs"> 
                                        <button class="mdc-button mdc-button--raised prev-tab" type="button">
                                            <span class="mdc-button__ripple"></span> 
                                            <i class="material-icons mdc-button__icon">navigate_before</i>
                                            <span class="mdc-button__label">Back</span>  
                                        </button>
                                        <button class="mdc-button mdc-button--raised next-tab" type="button">
                                            <span class="mdc-button__ripple"></span> 
                                            <span class="mdc-button__label">Save</span> 
                                            <i class="material-icons mdc-button__icon">navigate_next</i>
                                        </button>  
                                    </div>  
                                </form>  
                            </div>
                            <div class="tab-content"> 
                                <form  id="sp-media-form" class="row property-create-form dropzone">  
                                    <input type="hidden" name="property_id" id="input_propety_id" value="{{ $property_id ?? '' }}">
                                    <input type="hidden" name="current_tab"  value="sp-media-form">
                                    <?php
                                            if(!empty($propertyLocation)&& !empty($propertyLocation->latlong)){
                                                echo '<input type="hidden" name="latlong"  id="map_lat_long" value="'.$propertyLocation->latlong.'">';
                                            }else{
                                                echo '<input type="hidden" name="latlong"  id="map_lat_long">';
                                            }
                                            ?>
                                    
                                    <div class="col-xs-12 p-3">
                                        <h1 class="fw-500 text-center">Media & Map</h1>
                                    </div> 
                                     <div class="col-xs-12 p-2" id="media-warning-list">
                                    </div>
                                    <div class="col-xs-12 p-2" id="warning-list">
                                        
                                    </div>
                                    <div class="col-xs-12 mt-2">  
                                        <label class="text-muted">Property Photos (max 8 images)</label> 
                                        <div id="property-images" class="dropzone needsclick">
                                            <div class="dz-message needsclick text-muted">    
                                                Drop pictures here or click here to upload.
                                            </div>
                                        </div> 
                                        
                                    </div> 
                                   
                                    
                                    
                                    <div class="col-xs-12 mb-2 p-0"> 
                                        <p class="uppercase m-2 fw-500">Locate the property on Map</p>  
                                    </div>
                                    
                                   
                                    <div class="col-xs-12 p-2">  
                                        <div class="mdc-text-field mdc-text-field--outlined" id="map_search_input_card">
                                            <input class="mdc-text-field__input"  id="map_search_input">
                                            <div class="mdc-notched-outline">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label">Enter location</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div> 
                                    </div>  
                                    
                                    <div class="col-xs-12 p-2">
                                        <div id="create-property-map" class="google-map col-xs-12 p-2"></div>
                                    </div> 
                                    
                                    
                                    
                                    <div class="col-xs-12 p-2 mt-3 row between-xs"> 
                                        <button class="mdc-button mdc-button--raised prev-tab" type="button">
                                            <span class="mdc-button__ripple"></span> 
                                            <i class="material-icons mdc-button__icon">navigate_before</i>
                                            <span class="mdc-button__label">Back</span>  
                                        </button>
                                        <button class="mdc-button mdc-button--raised next-tab" type="button">
                                            <span class="mdc-button__ripple"></span> 
                                            <span class="mdc-button__label">Save</span> 
                                            <i class="material-icons mdc-button__icon">navigate_next</i>
                                        </button>  
                                    </div>  
                                </form>  
                            </div>
                            <div class="tab-content"> 
                                <div class="column center-xs middle-xs pt-5 text-center">  
                                    <button class="mdc-fab primary">
                                        <span class="mdc-fab__ripple"></span>
                                        <span class="mdc-fab__icon material-icons mat-icon-lg">check</span>
                                    </button>  
                                    <h2 class="mt-3 uppercase">Congratulations!</h2>
                                    <h2 class="my-3">Your property has been submitted</h2>
                                    <p class="text-muted fw-500">Preview the property listing before publishing it. You can publish and view the property listing by clicking here <a href="{{url('/home')}}">Listings</a></p>
                                    <p class="text-muted fw-500">Click  "<button class="mdc-icon-button material-icons primary-color">backup</button>" to  publish the property to public. </p>
                                </div>
                                
                                <div class="row center-xs middle-xs py-3"> 
                    <a href="{{ route('property.new') }}" class="mdc-button  bg-accent mdc-button--raised d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">Return to submit new property</span> 
                    </a> 
                </div> 
                     
                            </div>
                        </div>  
                        <div id="dropzone-preview-template" class="d-none plan-image-template">
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-image"><img src="{{asset('images/others/transparent-bg.png')}}" data-dz-thumbnail="" alt="prop-image"></div>
                                <div class="dz-details">
                                    <div class="dz-size"><span data-dz-size=""></span></div>
                                    <div class="dz-filename"><span data-dz-name=""></span></div>
                                </div>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                <div class="dz-success-mark">
                                    <i class="material-icons mat-icon-xlg">check</i> 
                                </div>
                                <div class="dz-error-mark">
                                    <i class="material-icons mat-icon-xlg">cancel</i> 
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div> 
            </div>  
        </div> 
@endsection

@section('jscript')
<script>
const data = "{{$propertyImages ?? '{}'}}";
var imageslist = JSON.parse(data.replace(/&quot;/g,'"'));
 
initDropzonePropertyImages(imageslist);
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwn34YxDsAG_m4WHj-KzubB_3NTD-Z8sE&callback=initMap&libraries=geometry,places&callback=initMap" defer ></script>

@endsection

