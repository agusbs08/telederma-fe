// let automatedDiagnoseResult = [];
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#examination-image-preview").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#examination-image").change(function() {
    readURL(this);
    (async function() {
        $("#examination-image-preview").show();
        $("#loading-spinner").show();
        const SKIN_CLASSES = {
            0: "akiec, Actinic Keratoses",
            1: "bcc, Basal Cell Carcinoma",
            2: "bkl, Benign Keratosis",
            3: "df, Dermatofibroma",
            4: "mel, Melanoma",
            5: "nv, Melanocytic Nevi",
            6: "vasc, Vascular skin lesion"
        };
        var model = await tf.loadModel("/model/model.json");
        let image = $("#examination-image-preview").get(0);
        let tensor = tf
            .fromPixels(image)
            .resizeNearestNeighbor([224, 224])
            .toFloat();
        let offset = tf.scalar(127.5);
        tensor = tensor
            .sub(offset)
            .div(offset)
            .expandDims();
        let predictions = await model.predict(tensor).data();
        automatedDiagnoseResult = Array.from(predictions)
            .map(function(p, i) {
                return {
                    probability: Math.round(p * 1000) / 1000,
                    class: SKIN_CLASSES[i]
                };
            })
            .sort(function(a, b) {
                return b.probability - a.probability;
            })
            .slice(0, 5);

        $("#loading-spinner").hide();
        $(".automated-diagnose-wrapper").show();
        automatedDiagnoseResult.forEach(t => {
            $(".automated-diagnose-result-wrapper").append(
                '<li class="nav-item">' +
                    '<a href="javascript:void(0);" class="nav-link disabled">' +
                    '<i class="nav-link-icon lnr-checkmark-circle"></i>' +
                    "<span>" +
                    t.class +
                    "</span>" +
                    '<div class="ml-auto badge badge-pill badge-secondary">' +
                    t.probability +
                    " %</div>" +
                    "</a>" +
                    "</li>"
            );
        });
    })();
});
