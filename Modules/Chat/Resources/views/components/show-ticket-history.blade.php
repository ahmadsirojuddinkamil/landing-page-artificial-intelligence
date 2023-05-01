<table class="table table-head-bg-primary mt-4">

    <thead>
        <tr>
            <th class="text-left col-6">
                <li class="fas fa-user-alt text-white mr-1"></li>
                {{ $t->name_sender }}
            </th>
            <th></th>
            <th></th>
            <th class="text-right col-6">
                {{ $t->created_at->format('d M Y (H:i:s)') }}
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td colspan="4">
                {{ $t->message_content }}
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <br>
                <div id="accordion">
                    @if ($t['image'] != null)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Image
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $t['image']) }}" alt=""
                                        class="img-thumbnail" height="200" width="200">
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($t['video'] != null)
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Video
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <video width="200" height="150" controls>
                                        <source src="{{ asset('storage/' . $t->video) }}" type="video/mp4">
                                        Your browser does not
                                        support
                                        the
                                        video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($t['document'] != null)
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Document
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <a href="{{ asset('storage/' . $t->document) }}"
                                        target="_blank"class="btn btn-warning">Download
                                        Document</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </td>
        </tr>

    </tbody>

</table>
