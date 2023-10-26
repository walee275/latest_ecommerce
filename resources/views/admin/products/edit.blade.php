@extends('layouts.admin')
@section('title', 'Edit Product')
@section('style')
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('admin.products') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Product</h5>
                    <hr />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.product.edit', $product) }}" method="POST" enctype="multipart/form-data"
                        id="form">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Product Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" placeholder="Enter product title"
                                                value="{{ old('title') ? old('title') : $product->title }}">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                rows="3">{{ old('description') ? old('description') : $product->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="pictures" class="form-label">Product Images</label>
                                            <input id="image-uploadify" name="pictures[]" type="file" accept="image/*"
                                                multiple class="form-control @error('pictures') is-invalid @enderror">
                                            @error('pictures')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded mb-3">
                                        <div class="row g-3">
                                            <div class="col" id="sizes-inputs-container">
                                                <h5 class="text-center mb-5">Product Sizes</h5>
                                                <div class="form-group mb-3">
                                                    <label for="size">Sizes File</label>
                                                    <input type="file" class="form-control" name="sizes_file"
                                                        id="sizes_file">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="price" class="form-label">Medicus Price</label>
                                                <input type="number"
                                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                                    name="price" placeholder="00.00"
                                                    value="{{ old('price') ? old('price') : $product->price }}">
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cost_price" class="form-label">Vendor Price</label>
                                                <input type="number"
                                                    class="form-control @error('cost_price') is-invalid @enderror"
                                                    id="cost_price" name="cost_price" placeholder="00.00"
                                                    value="{{ old('cost_price') ? old('cost_price') : $product->cost_price }}">
                                                @error('cost_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <label for="vendor" class="form-label">Vendor</label>
                                                <select name="vendor" id="vendor" class="form-select">
                                                    <option value="">Select vendor</option>
                                                    @forelse ($vendors as $vendor)
                                                        <option value="{{ $vendor->id }}"
                                                            {{ (old('vendor') && old('vendor') == $vendor->id) || ($product->vendor_id && $product->vendor_id == $vendor->id) ? 'selected' : '' }}>
                                                            {{ $vendor->name }}
                                                        </option>

                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="category" class="form-label">Product Category</label>
                                                <select class="form-select @error('category') is-invalid @enderror"
                                                    id="category" name="category">
                                                    <option value="">Select product category</option>
                                                    @foreach ($categories as $cat)
                                                        @php
                                                            // Convert the array of subcategory IDs into a comma-separated string
                                                            if (count($cat->subcategories)) {
                                                                $subcategoryIds = implode(',', $cat->subcategories->pluck('id')->toArray());
                                                            } else {
                                                                $subcategoryIds = '';
                                                            }
                                                        @endphp
                                                        <option value="{{ $cat->id }}"
                                                            data-subcategories="{{ $subcategoryIds }}"
                                                            @if (old('category')) {{ old('category') == $cat->id ? 'selected' : '' }}
                                                            @else
                                                            {{ $cat->id == $product->categorie_id ? 'selected' : '' }} @endif>
                                                            {{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="category" class="form-label">Sub Category</label>
                                                <select
                                                    class="form-select select2 @error('subcategory') is-invalid @enderror"
                                                    id="subcategory" name="subcategory">

                                                    <option value="">Select Product Sub Category</option>
                                                    @foreach ($subcategories as $subcat)
                                                        <option value="{{ $subcat->id }}"
                                                            data-category="{{ $subcat->parent_category }}"
                                                            {{ old('subcategory') == $subcat->id || $subcat->id == $product->sub_category_id ? 'selected' : '' }}>
                                                            {{ $subcat->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subcategory')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="submit" class="btn btn-primary">Save
                                                        Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>


                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    {{-- <script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {




            // Store the original options of the subcategory dropdown
            var originalSubCategories = $('#subcategory').html();

            // Function to update the subcategory dropdown options based on the selected category
            function updateSubcategories() {
                var selectedCategoryId = $('#category').val();
                if (selectedCategoryId != '' && selectedCategoryId !== undefined) {
                    var filteredSubCategories = $(originalSubCategories).filter(function() {
                        return $(this).data('category') == selectedCategoryId;
                    });
                    if (filteredSubCategories.length != '' && filteredSubCategories !== undefined) {
                        console.log(filteredSubCategories);
                        $('#subcategory').html(filteredSubCategories);
                    } else {
                        $('#subcategory').html('<option value="">Select sub category</option>');

                    }
                } else {
                    $('#subcategory').html('<option value="">Select sub category</option>');

                }

            }

            // Function to update the category dropdown based on the selected subcategory
            function updateCategories() {
                var selectedSubCategoryId = $('#subcategory').val();
                var filteredCategories = $('#category').children().filter(function() {
                    let subcategoriesStr = $(this).data('subcategories');
                    subcategoriesStr = String(subcategoriesStr);
                    let thisSubcategories = subcategoriesStr ? subcategoriesStr.split(',').map(id =>
                        parseInt(id)) : [];
                    console.log(thisSubcategories)
                    return thisSubcategories.includes(selectedSubCategoryId);
                });


                $('#category').html(filteredCategories);
            }

            // Initial setup: Update subcategory options based on selected category
            updateSubcategories();

            // Event listener for changes in the category dropdown
            $('#category').on('change', function() {
                updateSubcategories();
            });

            // Event listener for changes in the subcategory dropdown
            $('#subcategory').on('change', function() {
                // updateCategories();
            });


            (function($, window, document, undefined) {
                window.addEventListener("dragover", function(e) {
                    e = e || event;
                    e.preventDefault();
                }, false);
                window.addEventListener("drop", function(e) {
                    e = e || event;
                    e.preventDefault();
                }, false);
                const compareMimeType = (mimeTypes, fileType, formatFile) => {
                    if (mimeTypes.length < 2 && mimeTypes[0] === "*") {
                        return true;
                    }
                    for (let index = 1; index < mimeTypes.length; index += 3) {
                        if (mimeTypes[index + 1] === "*" && fileType.search(new RegExp(mimeTypes[index])) !=
                            -1) {
                            return true;
                        } else if (mimeTypes[index + 1] && mimeTypes[index + 1] != "*" && fileType.search(
                                new RegExp("\\*" + mimeTypes[index + 1] + "\\*")) != -1) {
                            return true;
                        } else if (mimeTypes[index + 1] && mimeTypes[index + 1] != "*" && fileType.search(
                                new RegExp(mimeTypes[index + 1])) != -1) {
                            return true;
                        } else if (mimeTypes[index + 1] === "" && (fileType.search(new RegExp(mimeTypes[
                                index])) != -1 || formatFile.search(new RegExp(mimeTypes[index])) != -1)) {
                            return true;
                        }
                    }
                    return false;
                }
                $.fn.imageuploadify = function(opts) {
                    const settings = $.extend({}, $.fn.imageuploadify.defaults, opts);
                    this.each(function() {
                        const self = this;
                        if (!$(self).attr("multiple")) {
                            return;
                        }
                        let accept = $(self).attr("accept") ? $(self).attr("accept").replace(/\s/g,
                            "").split(",") : null;
                        let result = [];
                        accept.forEach((item) => {
                            let regexp;
                            if (item.search(/\//) != -1) {
                                regexp = new RegExp("([A-Za-z-.]*)\/([A-Za-z-*.]*)", "g");
                            } else {
                                regexp = new RegExp("\.([A-Za-z-]*)()", "g");
                            }
                            const r = regexp.exec(item);
                            result = result.concat(r);
                        });
                        let totalFiles = [];
                        let counter = 0;
                        let dragbox = $(
                            `<div class="imageuploadify well"><div class="imageuploadify-overlay"><i class="fa fa-picture-o"></i></div><div class="imageuploadify-images-list text-center"><i class="bx bxs-cloud-upload"></i><span class='imageuploadify-message'>Drag&Drop Your File(s)Here To Upload</span><button type="button"class="btn btn-default">or select file to upload</button></div></div>`
                        );
                        let overlay = dragbox.find(".imageuploadify-overlay");
                        let uploadIcon = dragbox.find(".imageuploadify-overlay i");
                        let imagesList = dragbox.find(".imageuploadify-images-list");
                        let addIcon = dragbox.find(".imageuploadify-images-list i");
                        let addMsg = dragbox.find(".imageuploadify-images-list span");
                        let button = dragbox.find(".imageuploadify-images-list button");
                        const retrieveFiles = (files) => {
                            for (let index = 0; index < files.length; ++index) {
                                if (!accept || compareMimeType(result, files[index].type,
                                        /(?:\.([^.]+))?$/.exec(files[index].name)[1])) {
                                    const id = Math.random().toString(36).substr(2, 9);
                                    readingFile(id, files[index]);
                                    totalFiles.push({
                                        id: id,
                                        file: files[index]
                                    });
                                }
                            }
                        }
                        const readingFile = (id, file) => {
                            const fReader = new FileReader();
                            const width = dragbox.width();
                            const boxesNb = Math.floor(width / 100);
                            const marginSize = Math.floor((width - (boxesNb * 100)) / (boxesNb +
                                1));
                            let container = $(
                                `<div class='imageuploadify-container'><button type='button'class='btn btn-danger bx bx-x'></button><div class='imageuploadify-details'><span>${file.name}</span><span>${file.type}</span><span>${file.size}</span></div></div>`
                            );
                            let details = container.find(".imageuploadify-details");
                            let deleteBtn = container.find("button");
                            container.css("margin-left", marginSize + "px");
                            details.hover(function() {
                                $(this).css("opacity", "1");
                            }).mouseleave(function() {
                                $(this).css("opacity", "0");
                            });
                            if (file.type && file.type.search(/image/) != -1) {
                                fReader.onloadend = function(e) {
                                    let image = $("<img>");
                                    image.attr("src", e.target.result);
                                    container.append(image);
                                    imagesList.append(container);
                                    imagesList.find(".imageuploadify-container:nth-child(" +
                                        boxesNb + "n+4)").css("margin-left",
                                        marginSize + "px");
                                    imagesList.find(".imageuploadify-container:nth-child(" +
                                        boxesNb + "n+3)").css("margin-right",
                                        marginSize + "px");
                                };
                            } else if (file.type) {
                                let type = "<i class='fa fa-file'></i>";
                                if (file.type.search(/audio/) != -1) {
                                    type = "<i class='fa fa-file-audio-o'></i>";
                                } else if (file.type.search(/video/) != -1) {
                                    type = "<i class='fa fa-file-video-o'></i>";
                                }
                                fReader.onloadend = function(e) {
                                    let span = $("<span>" + type + "</span>");
                                    span.css("font-size", "5em");
                                    container.append(span);
                                    imagesList.append(container);
                                    imagesList.find(".imageuploadify-container:nth-child(" +
                                        boxesNb + "n+4)").css("margin-left",
                                        marginSize + "px");
                                    imagesList.find(".imageuploadify-container:nth-child(" +
                                        boxesNb + "n+3)").css("margin-right",
                                        marginSize + "px");
                                };
                            }
                            deleteBtn.on("click", function() {
                                $(this.parentElement).remove();
                                for (let index = 0; totalFiles.length > index; ++
                                    index) {
                                    if (totalFiles[index].id === id) {
                                        totalFiles.splice(index, 1);
                                        break;
                                    }
                                }
                            });
                            fReader.readAsDataURL(file);
                        };
                        const disableMouseEvents = () => {
                            overlay.css("display", "flex");
                            dragbox.css("border-color", "#3AA0FF");
                            button.css("pointer-events", "none");
                            addMsg.css("pointer-events", "none");
                            addIcon.css("pointer-events", "none");
                            imagesList.css("pointer-events", "none");
                        }
                        const enableMouseEvents = () => {
                            overlay.css("display", "none");
                            dragbox.css("border-color", "rgb(210, 210, 210)");
                            button.css("pointer-events", "initial");
                            addMsg.css("pointer-events", "initial");
                            addIcon.css("pointer-events", "initial");
                            imagesList.css("pointer-events", "initial");
                        }
                        button.mouseenter(function onMouseEnter(event) {
                            button.css("background", "#3AA0FF").css("color", "white");
                        }).mouseleave(function onMouseLeave() {
                            button.css("background", "white").css("color", "#3AA0FF");
                        });
                        button.on("click", function onClick(event) {
                            event.stopPropagation();
                            event.preventDefault();
                            $(self).click();
                        });
                        dragbox.on("dragenter", function onDragenter(event) {
                            event.stopPropagation();
                            event.preventDefault();
                            counter++;
                            disableMouseEvents();
                        });
                        dragbox.on("dragleave", function onDragLeave(event) {
                            event.stopPropagation();
                            event.preventDefault();
                            counter--;
                            if (counter === 0) {
                                enableMouseEvents();
                            }
                        });
                        dragbox.on("drop", function onDrop(event) {
                            event.stopPropagation();
                            event.preventDefault();
                            enableMouseEvents();
                            const files = event.originalEvent.dataTransfer.files;
                            retrieveFiles(files);
                        });
                        $(window).bind("resize", function(e) {
                            window.resizeEvt;
                            $(window).resize(function() {
                                clearTimeout(window.resizeEvt);
                                window.resizeEvt = setTimeout(function() {
                                    const width = dragbox.width();
                                    const boxesNb = Math.floor(width / 100);
                                    const marginSize = Math.floor((width - (
                                        boxesNb * 100)) / (boxesNb +
                                        1));
                                    let containers = imagesList.find(
                                        ".imageuploadify-container");
                                    for (let index = 0; index < containers
                                        .length; ++index) {
                                        $(containers[index]).css(
                                            "margin-right", "0px");
                                        $(containers[index]).css(
                                            "margin-left", marginSize +
                                            "px");
                                    }
                                    imagesList.find(
                                        ".imageuploadify-container:nth-child(" +
                                        boxesNb + "n+4)").css(
                                        "margin-left", marginSize + "px"
                                    );
                                    imagesList.find(
                                        ".imageuploadify-container:nth-child(" +
                                        boxesNb + "n+3)").css(
                                        "margin-right", marginSize +
                                        "px");
                                }, 500);
                            });
                        })
                        $(self).on("change", function onChange() {
                            const files = this.files;
                            retrieveFiles(files);
                        });
                        // $(self).closest("form").on("submit", function(event) {
                        //     event.stopPropagation();
                        //     event.preventDefault(event);
                        //     // const inputs = this.querySelectorAll(
                        //     //     "input, textarea, select, button");
                        //     // const formData = new FormData();
                        //     // for (let index = 0; index < inputs.length; ++index) {
                        //     //     if (inputs[index].tagName === "SELECT" && inputs[index]
                        //     //         .hasAttribute("multiple")) {
                        //     //         const options = inputs[index].options;
                        //     //         for (let i = 0; options.length > i; ++i) {
                        //     //             if (options[i].selected) {
                        //     //                 formData.append(inputs[index].getAttribute(
                        //     //                     "name"), options[i].value);
                        //     //             }
                        //     //         }
                        //     //     } else if (!inputs[index].getAttribute("type") || ((inputs[
                        //     //                 index].getAttribute("type").toLowerCase()) !==
                        //     //             "checkbox" && (inputs[index].getAttribute("type")
                        //     //                 .toLowerCase()) !== "radio") || inputs[index]
                        //     //         .checked) {
                        //     //         formData.append(inputs[index].name, inputs[index]
                        //     //             .value);
                        //     //     } else if ($(inputs[index]).getAttribute("type") !=
                        //     //         "file") {
                        //     //         formData.append(inputs[index].name, inputs[index]
                        //     //             .value);
                        //     //     }
                        //     // }
                        //     // for (var i = 0; i < totalFiles.length; i++) {
                        //     //     formData.append(self.name, totalFiles[i].file);
                        //     // }
                        //     const form = $('#form');
                        //     const name = $('#name').val();
                        //     const description = $('#description').val();
                        //     const images = document.querySelector('#image-uploadify').files;
                        //     const price = $('#price').val();
                        //     const costPrice = $('#cost_price').val();
                        //     const category = $('#category').val();
                        //     const inventory = $('#inventory').val();
                        //     // console.log(images[0]);
                        //     //     return;
                        //     const formData = new FormData();
                        //     formData.append('name', name);
                        //     formData.append('description', description);
                        //     // images.
                        //     // for (let i = 0; i < images.length; i++) {
                        //     //     // console.log(images[i]);
                        //     //     formData.append('pictures[]', images[i]);
                        //     // }
                        //     formData.append('pictures[]', images[0]);
                        //     // formData.append('images', images[0]); // Assuming you want to send only the first selected file
                        //     formData.append('price', price);
                        //     formData.append('costPrice', costPrice);
                        //     formData.append('category', category);
                        //     formData.append('inventory', inventory);
                        //     console.log(formData);
                        //     // return;

                        //     fetch('{{ route('admin.product.create') }}', {
                        //         method: 'POST',
                        //         body: formData,
                        //         headers: {
                        //             'X-CSRF-TOKEN': '{{ csrf_token() }}', // Assuming you're using Laravel's CSRF protection
                        //         },
                        //     }).then(function(response) {
                        //         return response.json();
                        //     }).then(function(result) {
                        //         console.log(result);
                        //     });
                        // });
                        // $('#image-uploadify').on('change', function() {
                        //     console.log('Files selected:', this.files);
                        // });
                        $(self).hide();
                        dragbox.insertAfter(this);
                    });
                    return this;
                };
                $.fn.imageuploadify.defaults = {};
            }(jQuery, window, document));

            $('#image-uploadify').imageuploadify();

        })
    </script>
@endsection
