@extends('layouts.masela')

@section('main')
 <div class="px-3">  
            <div class="theme-container">   
                <div class="page-drawer-container mt-3">
                    @include('layouts.bomenu')
                    <div class="mdc-drawer-scrim page-sidenav-scrim"></div>  
                    <div class="page-sidenav-content"> 
                        <div class="row mdc-card between-xs middle-xs w-100 p-2 mdc-elevation--z1 text-muted d-md-none d-lg-none d-xl-none mb-3">
                            <button id="page-sidenav-toggle" class="mdc-icon-button material-icons">more_vert</button> 
                            <h3 class="fw-500">My Account</h3>
                        </div> 
                        <div class="mdc-card p-3">
                            <div class="mdc-text-field mdc-text-field--outlined custom-field w-100">
                                <input class="mdc-text-field__input" placeholder="Type for filter properties">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Filter properties</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>  
                            <div class="mdc-data-table border-0 w-100 mt-3">
                                <table class="mdc-data-table__table" aria-label="Dessert calories">
                                    <thead>
                                        <tr class="mdc-data-table__header-row">
                                            <th class="mdc-data-table__header-cell">ID</th>
                                            <th class="mdc-data-table__header-cell">Image</th>
                                            <th class="mdc-data-table__header-cell">Title</th>
                                            <th class="mdc-data-table__header-cell">Published</th>
                                            <th class="mdc-data-table__header-cell">Views</th>
                                            <th class="mdc-data-table__header-cell">status</th>
                                            <th class="mdc-data-table__header-cell">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mdc-data-table__content">
                                        <tr class="mdc-data-table__row">
                                            <td class="mdc-data-table__cell">1</td>
                                            <td class="mdc-data-table__cell"><img src="{{ asset('images/props/flat-1/1-small.jpg')}}" alt="pro-image" width="100" class="d-block py-3"></td>
                                            <td class="mdc-data-table__cell"><a href="property.html" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary normal">Modern and quirky flat</a></td>
                                            <td class="mdc-data-table__cell">12 August, 2012</td>
                                            <td class="mdc-data-table__cell">322</td>
                                            <td class="mdc-data-table__cell">Pending</td>
                                            <td class="mdc-data-table__cell">
                                                <button class="mdc-icon-button material-icons primary-color">edit</button>
                                                <button class="mdc-icon-button material-icons warn-color">delete</button>
                                            </td>
                                        </tr>
                                        <tr class="mdc-data-table__row">
                                            <td class="mdc-data-table__cell">2</td>
                                            <td class="mdc-data-table__cell"><img src="{{ asset('images/props/office/1-small.jpg')}}" alt="pro-image" width="100" class="d-block py-3"></td>
                                            <td class="mdc-data-table__cell"><a href="property.html" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary normal">Centrally located office</a></td>
                                            <td class="mdc-data-table__cell">18 September, 2013</td>
                                            <td class="mdc-data-table__cell">258</td>
                                            <td class="mdc-data-table__cell">Active</td>
                                            <td class="mdc-data-table__cell">
                                                <button class="mdc-icon-button material-icons primary-color">edit</button>
                                                <button class="mdc-icon-button material-icons warn-color">delete</button>
                                            </td>
                                        </tr>
                                        <tr class="mdc-data-table__row">
                                            <td class="mdc-data-table__cell">3</td>
                                            <td class="mdc-data-table__cell"><img src="assets/images/props/house-1/1-small.jpg" alt="pro-image" width="100" class="d-block py-3"></td>
                                            <td class="mdc-data-table__cell"><a href="property.html" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary normal">Comfortable family house</a></td>
                                            <td class="mdc-data-table__cell">19 November, 2013</td>
                                            <td class="mdc-data-table__cell">125</td>
                                            <td class="mdc-data-table__cell">Expired</td>
                                            <td class="mdc-data-table__cell">
                                                <button class="mdc-icon-button material-icons primary-color">edit</button>
                                                <button class="mdc-icon-button material-icons warn-color">delete</button>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div> 
                        </div> 
                        <div class="row center-xs middle-xs my-3 w-100">                
                            <div class="mdc-card w-100"> 
                                <ul class="theme-pagination">
                                    <li class="pagination-previous disabled"><span>Previous</span></li>
                                    <li class="current"><span>1</span></li>
                                    <li><a><span>2</span></a></li>
                                    <li><a><span>3</span></a></li>
                                    <li><a><span>4</span></a></li>
                                    <li class="pagination-next"><a><span>Next</span></a></li>
                                </ul> 
                            </div>
                        </div> 
                    </div> 
                </div>  
            </div>  
        </div> 



@endsection

