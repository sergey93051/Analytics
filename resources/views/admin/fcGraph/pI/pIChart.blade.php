<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Page Impressions</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div>
                                <canvas id="pI-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start mt-6">
                        <div class="col-md-4">
                            <label for="select-chart-pI">choose days</label>
                            <select id="select-chart-pI" class="form-control">
                                <option value="day">day</option>
                                <option value="week">week</option>
                                <option value="days_28" selected>28 days</option>
                            </select>
                            <div class="col-md m-2">
                                <strong class="p-1">end time:</strong>
                                <span class="end-date"></span>
                            </div>
                            <button class="btn btn-primery mb-4 mt-2 select-pI-btn">Find</button>
                        </div>
                        <div class="col-md-6 mt-4">
                            <ul>
                                <li><span class="pIboxs-style0"></span>
                                    <span class="p-2">
                                        - The number of times any content from your Page or about your Page has been
                                        displayed on the user's screen. This includes posts, stories, advertisements,
                                        and other content or information about your Page.
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style1"></span>
                                    <span class="p-2">
                                        - The number of people who have shown content from your Page or about your Page.
                                        This includes posts, stories, visit stamps, social information about people who
                                        have interacted with your Page, and more.
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style2"></span>
                                    <span class="p-2">- The number of times any content from a post or story from your
                                        Page or about your Page appears on a user's screen as a result of paid
                                        distribution - for example, advertising.</span>
                                </li>
                                <li>
                                    <span class="pIboxs-style3"></span>
                                    <span class="p-2"> - The number of people on whose screen any content from your Page
                                        or about your Page has been displayed as a result of paid distribution - for
                                        example, advertising.
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style4"></span>
                                    <span class="p-2"> - The number of times any content from a post or story from your
                                        Page or about your Page has been displayed on a user's screen as a result of an
                                        unpaid distribution.
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style5"></span>
                                    <span class="p-2"> - The number of people on whose screen, as a result of free
                                        distribution, content from your Page or about your Page was shown. This includes
                                        posts, stories, visit stamps, social information about people who have
                                        interacted with your Page, and more.
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style6"></span>
                                    <span class="p-2"> - The number of times a user has shown content from your Page or
                                        about your Page with social information attached. Social information is shown
                                        when a friend of a user interacts with your Page, post or news, for example,
                                        likes or subscribes to the Page, interacts with the post, shares a photo from
                                        your Page, or marks a visit to it.
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style7"></span>
                                    The number of people who have shown content from your Page or about your Page with
                                    social information attached. Social information is a form of organic dissemination.
                                    It is shown when a friend of a user interacts with your Page, post or story, for
                                    example, likes or subscribes to the Page, interacts with the post, shares a photo
                                    from your Page, or marks a visit to it. <span class="p-2"> -
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style8"></span>
                                    <span class="p-2"> - The total number of impressions for posts about your Page made
                                        by a friend (by type).
                                    </span>
                                </li>
                                <li>
                                    <span class="pIboxs-style9"></span>
                                    <span class="p-2"> - The number of people who have seen a friend's posts about your
                                        Page (by type).
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
