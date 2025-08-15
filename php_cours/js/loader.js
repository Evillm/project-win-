

var ctx = document.getElementById("circularLoader").getContext("2d"); // الخطأ 1: كان "20" بدلاً من "2d"
var al = 0;
var start = 4.72;
var cw = ctx.canvas.width;
var ch = ctx.canvas.height;
var diff;
var sim; // إضافة متغير sim المفقود

function progressSim() {
    diff = ((al / 100) * Math.PI*2*10).toFixed(2);
    ctx.clearRect(0, 0, cw, ch);
    ctx.lineWidth = 17; // الخطأ 2: linewidth يجب أن تكون lineWidth (حساس لحالة الأحرف)
    ctx.fillStyle = '#4285f4'; // الخطأ 3: إزالة ' الزائدة قبل #
    ctx.strokeStyle = "#4285f4"; // الخطأ 4: إزالة ' الزائدة قبل #
    ctx.textAlign = "center";
    ctx.font = "28px monospace";
    ctx.fillText(al + '%', cw * 0.52, ch * 0.5 + 5); // الخطأ 5: تصحيح كتابة المعاملات
    ctx.beginPath();
    ctx.arc(100, 100, 75, start, diff/10 + start, false); // الخطأ 6: تصحيح العملية الحسابية
    ctx.stroke();
    if(al >= 100){ // الخطأ 7: تصحيح \geq إلى >=
        clearTimeout(sim);
        // الكود الذي ينفذ عند اكتمال التقدم
    }
}


var sim = setInterval(progressSim , 501);