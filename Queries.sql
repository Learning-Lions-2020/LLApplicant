select 
Applicants.ID, 
Applicants.Name,

	(CASE WHEN QuestionnaireAnswers.QuestionID = 1 THEN QuestionnaireAnswers.Answer else 0 end) as Q1,
	(CASE WHEN QuestionnaireAnswers.QuestionID = 2 THEN QuestionnaireAnswers.Answer else 0 end) as Q2,
	(CASE WHEN QuestionnaireAnswers.QuestionID = 3 THEN QuestionnaireAnswers.Answer else 0 end) as Q3,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 4 THEN QuestionnaireAnswers.Answer else 0 end) as Q4,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 5 THEN QuestionnaireAnswers.Answer else 0 end) as Q5,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 6 THEN QuestionnaireAnswers.Answer else 0 end) as Q6,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 7 THEN QuestionnaireAnswers.Answer else 0 end) as Q7,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 8 THEN QuestionnaireAnswers.Answer else 0 end) as Q8,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 9 THEN QuestionnaireAnswers.Answer else 0 end) as Q9,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 10 THEN QuestionnaireAnswers.Answer else 0 end) as Q10,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 11 THEN QuestionnaireAnswers.Answer else 0 end) as Q11,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 12 THEN QuestionnaireAnswers.Answer else 0 end) as Q12,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 13 THEN QuestionnaireAnswers.Answer else 0 end) as Q13,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 14 THEN QuestionnaireAnswers.Answer else 0 end) as Q14,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 15 THEN QuestionnaireAnswers.Answer else 0 end) as Q15,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 16 THEN QuestionnaireAnswers.Answer else 0 end) as Q16,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 17 THEN QuestionnaireAnswers.Answer else 0 end) as Q17,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 18 THEN QuestionnaireAnswers.Answer else 0 end) as Q18,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 19 THEN QuestionnaireAnswers.Answer else 0 end) as Q19,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 20 THEN QuestionnaireAnswers.Answer else 0 end) as Q20,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 21 THEN QuestionnaireAnswers.Answer else 0 end) as Q21,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 22 THEN QuestionnaireAnswers.Answer else 0 end) as Q22,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 23 THEN QuestionnaireAnswers.Answer else 0 end) as Q23,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 24 THEN QuestionnaireAnswers.Answer else 0 end) as Q24,
    (CASE WHEN QuestionnaireAnswers.QuestionID = 25 THEN QuestionnaireAnswers.Answer else 0 end) as Q25

from Applicants
join QuestionnaireAnswers on Applicants.ID = QuestionnaireAnswers.ApplicantID
join QuestionnaireQuestions on QuestionnaireQuestions.ID = QuestionnaireAnswers.QuestionID
group by Applicants.ID;