#include <iostream>

using namespace std;

float dias_laborados, dias_aguinaldo = 30, salario_diario, proporcional_aguinaldo = 0;

float salario_tope, prima_antiguedad = 0;
int factor_antiguedad, a�os_trabajados, dias_por_a�o = 12;

int dias_proporcional_vacaciones, proporcional_vacaciones, dias_vacaciones = 15;

float indemnizacion;

void Proporcional_Aguinaldo()
{
    cout << "Cuantos fueron los dias laborados ??" << endl;
    cin >> dias_laborados;

    cout << "Cual es tu salario diario ??" << endl;
    cin >> salario_diario;

    proporcional_aguinaldo = dias_aguinaldo / 365 * dias_laborados * salario_diario;

    cout << "Tu proporcional de aguinaldo es " << proporcional_aguinaldo << endl;
}

void Prima_Antiguedad()
{
    cout << "Cual es el salario tope ??" << endl;
    cin >> salario_tope;

    cout << "Cuantos son los a�os trabajados ??" << endl;
    cin >> a�os_trabajados;

    if (a�os_trabajados >= 10)
        factor_antiguedad = 10;
    else if (a�os_trabajados >= 7 && a�os_trabajados < 10)
        factor_antiguedad = 7;
    else if (a�os_trabajados >= 5 && a�os_trabajados < 7)
        factor_antiguedad = 5;
    else if (a�os_trabajados >= 3 && a�os_trabajados < 5)
        factor_antiguedad = 3;
    else if (a�os_trabajados < 3)
        factor_antiguedad = 1;

    prima_antiguedad = float(salario_tope * factor_antiguedad * dias_por_a�o);

    cout << "Prima de Antiguedad " << prima_antiguedad << endl;
}

void Proporcional_Vacaciones()
{
	dias_proporcional_vacaciones = dias_vacaciones / 365 * dias_laborados;
	proporcional_vacaciones = dias_proporcional_vacaciones * salario_diario;
}

void Indemnizacion()
{
	indemnizacion = salario_diario * 90;
}

void main()
{
    Proporcional_Aguinaldo();

    Prima_Antiguedad();

	Proporcional_Vacaciones();

	Indemnizacion();

    system("pause");
}
