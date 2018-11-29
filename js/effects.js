var baseUrl = 'localhost';
var loadingGifMd = '<i class="fa fa-spinner fa-pulse fa-3x fa-fw centralizer"></i>';
var loadingGifXs = '<i class="fa fa-spinner fa-pulse fa-fw centralizer"></i>';
var ajaxSleep = 1000;

function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'pt'}, 'google_translate_element');
}
function searchDisciplines(val) {
	var year = parseInt($("#filter-year").val()) + val;
	$("#user-disciplines").html(loadingGifMd);
	$("#filter-year").val(year);
	ajax(function(result) {
		$("#user-disciplines").html(result);
	}, baseUrl+"user/Classroom/FilterDiscipline", "year="+year, ajaxSleep);
}
function searchClassRooms(val) {
	var year = parseInt($("#filter-year").val()) + val;
	$("#user-classroom").html(loadingGifMd);
	$("#filter-year").val(year);
	ajax(function(result) {
		$("#user-classroom").html(result);
	}, baseUrl+"user/Classroom/FilterSchedule", "year="+year, ajaxSleep);
}
function searchClassStudent(val) {
	var year = parseInt($("#filter-year").val()) + val;
	$("#user-students").html(loadingGifMd);
	$("#filter-year").val(year);
	if(val) {
		loadTurmas(function(result) {
			ajax(function(result) {
				$("#user-students").html(result);
			}, baseUrl+"user/Classroom/FilterStudent", "year="+year+"&turma="+$('#TurmaList').val(), ajaxSleep);
		});
	} else {
		ajax(function(result) {
			$("#user-students").html(result);
		}, baseUrl+"user/Classroom/FilterStudent", "year="+year+"&turma="+$('#TurmaList').val(), ajaxSleep);
	}
}
function loadTurmas(handleResult) {
	$("#TurmaList").empty();
	$('#TurmaList').append(new Option("SELECIONE", "-1"));
	ajax(function(result) {
		var data = JSON.parse(result);
		if (data['turmas'] != null) {
			for (var i = 0; i < Object.keys(data['turmas']).length; i++) {
				if(data['turmas'][i].fk_turma != null)
					$('#TurmaList').append(new Option(data['turmas'][i].nome, data['turmas'][i].fk_turma));
			}
		}
		handleResult(true);
	}, baseUrl+"user/Classroom/GetTeacherTurmas", "year="+$("#filter-year").val(), 100);
}
function removeNote()
{

}
function newNote()
{
	var newNota = $('#ProvaList').children('option').length;
	$('#ProvaList').append(new Option("Prova "+newNota, newNota));
	$('#student-notes-table tr').each(function() {
		$('#ProvaList option')[newNota].selected = true;
		$("#noteMax", this).val($("#notaMaxima").val());
		$("#note", this).val('0');
		$("#note", this).val('0');
		$("#description", this).val('SEM');
	});
}
function saveNotes()
{
	var year = $("#filter-year").val();
	var turmaId = $("#TurmaList").val();
	var disciplineId = $("#DisciplinaList").val();
	var prova = $("#ProvaList").val();
	var bimestre = $("#bimestreList").val();
	var noteMax = $("#notaMaxima").val();
	var users = [];
	var notes = [];
	var descriptions = [];
	var count = 0;
	if (noteMax > 0)
	{
		$('#student-notes-table tr').each(function() {
			users[count] = $(this).attr('id');
			var note = $("#note", this).val();
			if (note == '' || note < 0 || note > noteMax)
			{
				notes[count] = 0;
				$("#note", this).val('0');
			}
			else
				notes[count] = note;
			descriptions[count] = $("#description", this).val();
			count++;
		});
		var dataString = "year="+year+"&turmaId="+turmaId+"&disciplineId="+disciplineId+"&prova="+prova+"&bimestre="+bimestre+
		"&noteMax="+noteMax+"&users="+JSON.stringify(users)+"&notes="+JSON.stringify(notes)+"&descriptions="+JSON.stringify(descriptions);
		ajax(function(result) {
			console.log(result);
		}, baseUrl+"user/Note/saveNotes", dataString, ajaxSleep);
	}
	else
	{
		$('#ModalInformation .modal-title').html('Informação');
		$('#ModalInformation .modal-body').html('Ajuste a nota maxima!');
		$('#ModalInformation').modal('show');
	}
}
function searchNote(val) {
	var year = parseInt($("#filter-year").val()) + val;
	$(".user-note").html(loadingGifMd);
	$("#filter-year").val(year);
	if(val) {
		$("#ProvaList").empty();
		$('#ProvaList').append(new Option("SELECIONE", "-1"));
		loadDisciplines(function(result) {});
		loadTurmas(function(result) {});
	} else {
		if ($("#DisciplinaList").val() != -1 && $("#TurmaList").val() != -1)
		{
			var provaIndex = $("#ProvaList").prop('selectedIndex');
			loadProvas(function(result) {
				if (provaIndex != 0) {
					if ($('#ProvaList').length)
						$('#ProvaList option')[provaIndex].selected = true;

					var dataString = "year="+year+"&disciplineId="+$("#DisciplinaList").val()+"&turmaId="+$("#TurmaList").val()
					+"&note="+$("#ProvaList").val()+"&bimestre="+$("#bimestreList").val();
					ajax(function(result) {
						$(".user-note").html(result);
					}, baseUrl+"user/note/search", dataString, ajaxSleep);
				} else
					$(".user-note").html('<div class="alert alert-warning row" role="alert"><strong>Avaliação!</strong> Selecione uma disciplina e uma turma primeiro.</div>');
			});
		}
		else
			$(".user-note").html('<div class="alert alert-warning row" role="alert"><strong>Avaliação!</strong> Selecione uma disciplina e uma turma primeiro.</div>');
	}
}
function loadDisciplines(handleResult) {
	$("#DisciplinaList").empty();
	$('#DisciplinaList').append(new Option("SELECIONE", "-1"));
	ajax(function(result) {
		var data = JSON.parse(result);
		if (data['disciplines'] != null) {
			for (var i = 0; i < Object.keys(data['disciplines']).length; i++) {
				if(data['disciplines'][i].fk_disciplina != null)
					$('#DisciplinaList').append(new Option(data['disciplines'][i].nome, data['disciplines'][i].fk_disciplina));
			}
		}
		handleResult(true);
	}, baseUrl+"user/note/GetDisciplines", "year="+$("#filter-year").val(), 100);
}
function loadProvas(handleResult) {
	$("#ProvaList").empty();
	$('#ProvaList').append(new Option("SELECIONE", "-1"));
	ajax(function(result) {
		var data = JSON.parse(result);
		if (data['provas'] != null) {
			for (var i = 0; i < Object.keys(data['provas']).length; i++) {
				if(data['provas'][i].idProva != null)
					$('#ProvaList').append(new Option("Prova "+data['provas'][i].prova, data['provas'][i].prova));
			}
		}
		handleResult(true);
	}, baseUrl+"user/note/GetListProvas", "year="+$("#filter-year").val()+"&disciplineId="+$("#DisciplinaList").val()+"&turmaId="+$("#TurmaList").val(), 100);
}
function searchBoletim(val) {
	var year = parseInt($("#boletimDate").val()) + val;
	$(".user-boletim").css('border', 'none');
	$(".user-boletim").html(loadingGifMd);
	$("#boletimDate").val(year);
	ajax(function(result) {
		$(".user-boletim").html(result);
	}, baseUrl+"user/boletim/search", "year="+year, ajaxSleep);
}
function saveUserRegistration() {
	ajax(function(result) {
		$('#ModalInformation .modal-title').html('Informação');
		$('#ModalInformation .modal-body').html('Dados atualizados com sucesso!');
		$('#ModalInformation').modal('show');
	}, baseUrl+"user/Registration/UpdateData", $('#user-registration-form').serialize(), ajaxSleep);
}
function printDiv(element)
{
	var printContents = document.getElementById(element).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
function savePDF(element, button, xMult, yMult, pages = 1)
{
	var auxButtonText = $(button).html();
	$(button).append(loadingGifXs);
    var quotes = document.getElementById(element);
    html2canvas(quotes, {
        onrendered: function(canvas) {
	        var pdf = new jsPDF('p', 'pt', 'letter');
			var width = $('#'+element).width();
			var height = $('#'+element).height();
	        for (var i = 1; i <= pages; i++) {
	            window.onePageCanvas = document.createElement("canvas");
	            onePageCanvas.setAttribute('width', 2480);
	            onePageCanvas.setAttribute('height', 3508);
	            var ctx = onePageCanvas.getContext('2d');
	            ctx.drawImage(canvas, 0, 0, width * xMult, height * yMult);
	            var canvasDataURL = onePageCanvas.toDataURL("image/png", 0);

	            if (i > 1)
	                pdf.addPage();

	            pdf.setPage(i);
	            pdf.addImage(canvasDataURL, 'PNG', 15, 15, width, height);
	        }
	        pdf.save('test.pdf');
	        $(button).html(auxButtonText);
    	}
  	});
}

// GALERIA
function loadGallery(evt, galleryId) {
	var galleryName = evt.text;
	$("#gallery_header p").html("Filtragem de fotos para a galeria: 2" + galleryName);
}