#include <bits/stdc++.h>
using namespace std;

int main()
{
	int n[] = {101,1};
	int m[] = {0,2};
	int* a = n;
	int* b = m;
	int* const* p = &a;
	(*p) = m;
	cout << (*p)[1];
}